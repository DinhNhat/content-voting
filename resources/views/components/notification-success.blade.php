@props([
    'redirect' => false,
    'messageToDisplay' => ''
])

<div
    x-cloak
    x-data="{
        isOpen: false,
        messageToDisplay: '{{ $messageToDisplay }}',
        showNotification(message) {
            this.isOpen = true
            this.messageToDisplay = message
            setTimeout(() => {
                this.isOpen = false
            }, 4000)
        }
    }"
    x-init="
        @if($redirect)
            $nextTick(() => showNotification(messageToDisplay))
        @else
            Livewire.on('ideaWasUpdated', message => {
                showNotification(message)
            })
            Livewire.on('ideaWasMarkedAsSpam', message => {
                showNotification(message)
            })
            Livewire.on('ideaWasMarkedAsNotSpam', message => {
                showNotification(message)
            })
            Livewire.on('statusWasUpdated', message => {
                showNotification(message)
            })
            Livewire.on('commentWasAdded', message => {
                showNotification(message)
            })
        @endif

    "
    x-show="isOpen"
    x-transition:enter.scale.20.origin.bottom.right.duration.300ms
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-8"
    @keydown.escape.window="isOpen"
    class="flex justify-between max-w-xs sm:max-w-sm w-full fixed z-20 bottom-0 right-0 bg-red-100 rounded-xl shadow-lg border px-4 py-5 mx-2 sm:mx-6 my-8">
    <div class="flex items-center">
        <svg class="text-green w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="font-semibold text-gray-500 text-sm sm:text-base ml-2" x-text="messageToDisplay"></div>
    </div>
    <button  @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

