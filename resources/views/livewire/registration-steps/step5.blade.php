<div>
    <label class="block mb-2 font-semibold">Password *</label>
    <input type="password" wire:model="password" class="border p-2 w-full rounded">
    @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Confirm Password *</label>
    <input type="password" wire:model="password_confirmation" class="border p-2 w-full rounded">
</div>
