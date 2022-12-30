@props(['errors'])

@if ($errors->any())
    <div
        x-data="{ isVisible: true }"
        x-init="setTimeout(() => {
            isVisible = false
        }, 5000)"
        x-show.transition.duration.1000ms="isVisible"
        {{ $attributes }}
     >
        <div class="font-medium text-red">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="text-red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
