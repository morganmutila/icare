<div>
    <label class="block mb-2 font-semibold">Nationality *</label>
    <input type="text" wire:model="nationality" class="border p-2 w-full rounded">
    @error('nationality')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Country of Residence *</label>
    <input type="text" wire:model="country_of_residence" class="border p-2 w-full rounded">
    @error('country_of_residence')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">ID Type *</label>
    <select wire:model="id_type" class="border p-2 w-full rounded">
        <option value="">-- Select --</option>
        <option value="national_id">National ID</option>
        <option value="passport">Passport</option>
        <option value="drivers_license">Driver's License</option>
    </select>
    @error('id_type')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
