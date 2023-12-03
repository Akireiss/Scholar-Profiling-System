@props(['selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
<option selected value="">Choose from below</option>
    {{ $slot }}
</select>
