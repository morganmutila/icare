<div>
    <label class="block mb-2 font-semibold">Email *</label>
    <input type="email" wire:model="email" class="border p-2 w-full rounded">
    @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Phone *</label>
    <input type="text" wire:model="phone" class="border p-2 w-full rounded">
    @error('phone')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <label class="block mt-4 mb-2 font-semibold">Address *</label>
    <textarea wire:model="address" class="border p-2 w-full rounded"></textarea>
    @error('address')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
