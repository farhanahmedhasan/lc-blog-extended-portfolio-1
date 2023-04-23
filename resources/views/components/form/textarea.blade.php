@props(['name', 'label', 'row'=> 4, 'col'=> 30,'value'=>"" ])

<x-form.inputWrapper>
	<x-form.label name="{{$name}}" label="{{$label}}"/>

	<textarea class="border border-gray-400 p-2 w-full" 
		name='{{$name}}' id='{{$name}}' cols="{{$col}}" rows="{{$row}}" 
		placeholder="Write your {{$label}}"
		required>{{$value ? $value : old($name)}}</textarea>

	<x-form.error name="{{$name}}"/>
</x-form.inputWrapper>