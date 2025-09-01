<div>
    <label class="block mb-2 font-semibold">Upload ID Image *</label>
    <input type="file" wire:model="id_image" accept=".jpg,.jpeg,.png" class="border p-2 w-full rounded">
    @error('id_image')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    @if ($id_image)
        <div class="mt-4">
            <p class="font-semibold">Preview:</p>
            <img src="{{ $id_image->temporaryUrl() }}" class="mt-2 rounded shadow w-48 h-auto border">
        </div>
    @endif

    {{-- Progress feedback while uploading --}}
    <div wire:loading wire:target="id_image" class="mt-2 text-blue-500">
        Uploading...
    </div>
</div>
