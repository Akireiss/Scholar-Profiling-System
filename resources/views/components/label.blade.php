@props(['value'])


<label  for="validationCustom01" {{ $attributes->merge(['class' => 'form-label']) }}>
    {{-- dedault: text-gray-700 --}}
    {{ $value ?? $slot }}
</label>
