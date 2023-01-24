<x-modal-confirm
    event-to-open-modal="custom-show-mark-idea-as-not-spam-modal"
    event-to-close-modal="ideaWasMarkedAsNotSpam"
    modal-title="Reset Spam Counter"
    modal-description="Are you sure you want to mark this idea as NOT spam? This will reset the spam counter to 0"
    modal-confirm-button-text="Reset Spam Counter"
    wire-click="markAsNotSpam"
/>

{{--<div--}}
{{--    x-cloak--}}
{{--    x-data="{ isOpen: false }"--}}
{{--    x-show="isOpen"--}}
{{--    @keydown.escape.window="isOpen"--}}
{{--    @custom-show-mark-idea-as-not-spam-modal.window="--}}
{{--    isOpen = true--}}
{{--    $nextTick(() => $refs.confirmButton.focus())--}}
{{--    "--}}
{{--    x-init="window.livewire.on('ideaWasMarkedAsNotSpam', () => {--}}
{{--        isOpen = false--}}
{{--    })"--}}
{{--    class="relative z-10"--}}
{{--    aria-labelledby="modal-title"--}}
{{--    role="dialog"--}}
{{--    aria-modal="true">--}}
{{--    <!----}}
{{--      Background backdrop, show/hide based on modal state.--}}

{{--      Entering: "ease-out duration-300"--}}
{{--        From: "opacity-0"--}}
{{--        To: "opacity-100"--}}
{{--      Leaving: "ease-in duration-200"--}}
{{--        From: "opacity-100"--}}
{{--        To: "opacity-0"--}}
{{--    -->--}}
{{--    <div--}}
{{--        x-show.transition.opacity="isOpen"--}}
{{--        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">--}}
{{--    </div>--}}

{{--    <div class="fixed inset-0 z-10 overflow-y-auto">--}}
{{--        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">--}}
{{--            <!----}}
{{--              Modal panel, show/hide based on modal state.--}}

{{--              Entering: "ease-out duration-300"--}}
{{--                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--                To: "opacity-100 translate-y-0 sm:scale-100"--}}
{{--              Leaving: "ease-in duration-200"--}}
{{--                From: "opacity-100 translate-y-0 sm:scale-100"--}}
{{--                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--            -->--}}
{{--            <div--}}
{{--                x-show="isOpen"--}}
{{--                x-transition.origin.bottom.duration.300ms.ease-in-out--}}
{{--                @click.away="isOpen = false"--}}
{{--                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">--}}
{{--                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">--}}
{{--                    <div class="sm:flex sm:items-start">--}}
{{--                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">--}}
{{--                            <svg class="h-6 w-6 text-red" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">--}}
{{--                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Reset Spam Counter</h3>--}}
{{--                            <div class="mt-2">--}}
{{--                                <p class="text-sm text-gray-500">--}}
{{--                                    Are you sure you want to mark this idea as NOT spam? This will reset the spam counter to 0--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">--}}
{{--                    <button wire:click="markAsNotSpam" x-ref="confirmButton" type="button" class="inline-flex w-full justify-center rounded-md border--}}
{{--                    border-transparent bg-violet-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-violet-400--}}
{{--                    focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">--}}
{{--                        Reset Spam Counter--}}
{{--                    </button>--}}
{{--                    <button--}}
{{--                        @click="isOpen = false"--}}
{{--                        type="button"--}}
{{--                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium--}}
{{--                        text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"--}}
{{--                    >--}}
{{--                        Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
