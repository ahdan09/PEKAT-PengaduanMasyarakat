@props(['disabled' => false, 'placeholder' => null, 'value' => null, 'rows' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} placeholder="{{ $placeholder ? $placeholder : ''}}" rows="{{ $rows }}" {!! $attributes->merge(['class' => 'bg-gray-900 text-white border-gray-700 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm']) !!}>{{ $value ? $value : old('description') }}</textarea>
