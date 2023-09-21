@props(['options', 'selected' => false, 'name' => ''])

<select name="{{ $name }}" {{ $attributes->merge(['class' => 'bg-gray-900 text-white border-gray-900 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm']) }}>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ $value === $selected ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
