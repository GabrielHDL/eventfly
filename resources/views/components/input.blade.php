@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-paradisePink focus:border-paradisePink focus:ring-paradisePink  text-faluRed rounded-md shadow-sm']) !!}>
