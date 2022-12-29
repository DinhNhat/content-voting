@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-beach">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="text-beach">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
