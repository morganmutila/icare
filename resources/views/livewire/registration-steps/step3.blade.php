<div>
    <label class="block mb-2 font-semibold">First Name *</label>
    <input type="text" wire:model="first_name" class="border p-2 w-full rounded">
    @error('first_name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Last Name *</label>
    <input type="text" wire:model="last_name" class="border p-2 w-full rounded">
    @error('last_name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Date of Birth *</label>
    <input type="date" wire:model="date_of_birth" class="border p-2 w-full rounded">
    @error('date_of_birth')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
