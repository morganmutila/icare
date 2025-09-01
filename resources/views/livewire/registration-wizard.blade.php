<div class="max-w-2xl p-6 bg-white shadow rounded text-black">
    {{-- Progress Bar --}}
    <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
        <div class="bg-blue-500 h-2 rounded-full" style="width: {{ ($step / 6) * 100 }}%"></div>
    </div>

    <h2 class="text-lg font-bold mb-4">Step {{ $step }} of 6</h2>

    {{-- Flash message --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Steps --}}
    @if ($step === 1)
        @include('livewire.registration-steps.step1')
    @elseif ($step === 2)
        @include('livewire.registration-steps.step2')
    @elseif ($step === 3)
        @include('livewire.registration-steps.step3')
    @elseif ($step === 4)
        @include('livewire.registration-steps.step4')
    @elseif ($step === 5)
        @include('livewire.registration-steps.step5')
    @elseif ($step === 6)
        @include('livewire.registration-steps.step6')
    @endif

    {{-- Navigation Buttons --}}
    <div class="mt-6 flex justify-between">
        @if ($step > 1)
            <button wire:click="previousStep" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</button>
        @else
            <span></span>
        @endif

        @if ($step < 6)
            <button wire:click="nextStep"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Next</button>
        @else
            <button wire:click="submit"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Submit</button>
        @endif
    </div>
</div>
