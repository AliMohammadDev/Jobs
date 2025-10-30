@props(['hasFile' => false])
<form
    {{ $attributes([
        'class' => 'max-w-2xl mx-auto space-y-6',
        'method' => 'GET',
        'enctype' => $hasFile ? 'multipart/form-data' : null,
    ]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
