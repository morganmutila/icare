<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationWizard extends Component
{
    use WithFileUploads;

    public $layout = 'layouts.app';
    public $step = 1;

    // Step 1: Identity
    public $nationality, $country_of_residence, $id_type;

    // Step 2: Image Upload
    public $id_image;

    // Step 3: Personal Details
    public $first_name, $last_name, $date_of_birth;

    // Step 4: Contact Information
    public $email, $phone, $address;

    // Step 5: Password
    public $password, $password_confirmation;

    protected $messages = [
        'required' => 'This field is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.confirmed' => 'Passwords do not match.',
    ];

    public function mount()
    {
        // Resume from session if available
        if (session()->has('registration_data')) {
            foreach (session('registration_data') as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function saveProgress()
    {
        session()->put('registration_data', $this->getFormData());
    }

    public function render()
    {
        return view('livewire.registration-wizard');
    }
    

    public function nextStep()
    {
        $this->validateStep();
        $this->saveProgress();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    protected function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'nationality' => 'required|string',
                'country_of_residence' => 'required|string',
                'id_type' => 'required|string',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'id_image' => 'required|image|mimes:jpeg,png|max:6048',
            ], [
                'id_image.required' => 'Please upload an image of your ID.',
                'id_image.image' => 'The file must be an image.',
                'id_image.mimes' => 'Only JPEG and PNG images are allowed.',
                'id_image.max' => 'The image must not be larger than 2MB.',
            ]);
        } elseif ($this->step == 3) {
            $this->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
            ]);
        } elseif ($this->step == 4) {
            $this->validate([
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|string',
                'address' => 'required|string',
            ]);
        } elseif ($this->step == 5) {
            $this->validate([
                'password' => 'required|min:6|confirmed',
            ]);
        }
    }

    public function submit()
    {
        $this->validateStep();

        $filename = $this->id_image->store('id_images', 'public');

        $user = User::create([
            'nationality' => $this->nationality,
            'country_of_residence' => $this->country_of_residence,
            'id_type' => $this->id_type,
            'id_image_path' => $filename,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->first_name . ' ' . $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' => Hash::make($this->password),
        ]);

        // Send email verification
        $user->sendEmailVerificationNotification();

        session()->forget('registration_data');

        session()->flash('success', 'Registration successful! Please check your email to verify your account.');

        return redirect()->route('login');
    }

    private function getFormData()
    {
        return [
            'nationality' => $this->nationality,
            'country_of_residence' => $this->country_of_residence,
            'id_type' => $this->id_type,
            // 'id_image' => $this->id_image,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ];
    }
}
