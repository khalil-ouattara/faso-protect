<div>
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700">
        {{ $label ?? '' }}
    </label>
    <select id="{{ $id ?? $name }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500']) }}>
        {{ $slot }}
    </select>
    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
