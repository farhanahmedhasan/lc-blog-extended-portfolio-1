@props(['active' => false])

@php
    $defaultClasses = "block text-left px-2 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white";
    $activeClasses =  " bg-blue-500 text-white";
@endphp

<a {{$attributes->class([$defaultClasses, $activeClasses => $active])}}>{{$slot}}</a>
