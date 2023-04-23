@props(['name', 'type'=> 'text', 'value'=>""])

<x-form.inputWrapper>
	<x-form.label name="{{$name}}"/>

	<input 
		class="border border-gray-400 p-2 w-full" 
		type='{{$type}}' 
		name='{{$name}}'
		id='{{$name}}'
		value="{{$value ? $value : old($name)}}"
		/>

	<x-form.error name="{{$name}}"/>
</x-form.inputWrapper>