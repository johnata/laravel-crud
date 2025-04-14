@props([
    'type' => 'text',
    'name',
    'label' => null,
    'placeholder' => null,
    'value' => null,
    'class' => '',
    'required' => false
])

<div class="relative z-0 w-full mb-5 group">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer {{ $class }} {{ $errors->has($name) ? 'border-red-500 focus:border-red-700' : '' }}"
        placeholder=" "
        value="{{ old($name, $value) }}"
        @if($required) required aria-required="true" @endif
    />
    <label
        for="{{ $name }}"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6  {{ $class }} {{ $errors->has($name) ? 'text-red-500' : '' }}"
    >
        {{ $label ?? ucfirst($name) }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
</div>

@error($name)
    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
@enderror
