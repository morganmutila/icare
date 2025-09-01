<div>
    <h3 class="font-bold mb-4 text-lg">Preview Your Information</h3>
    <ul class="list-disc pl-5 space-y-1 text-gray-700">
        <li><strong>Nationality:</strong> {{ $nationality }}</li>
        <li><strong>Country:</strong> {{ $country_of_residence }}</li>
        <li><strong>ID Type:</strong> {{ $id_type }}</li>
        @if ($id_image)
            <li><strong>ID Image:</strong> <img src="{{ $id_image->temporaryUrl() }}" class="w-48 mt-2 rounded shadow">
            </li>
        @endif
        <li><strong>First Name:</strong> {{ $first_name }}</li>
        <li><strong>Last Name:</strong> {{ $last_name }}</li>
        <li><strong>Date of Birth:</strong> {{ $date_of_birth }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Phone:</strong> {{ $phone }}</li>
        <li><strong>Address:</strong> {{ $address }}</li>
    </ul>
</div>
