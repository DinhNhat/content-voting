<x-test.master-layout>
    <p class="text-center">This is test master layout</p>
    <div x-data="{ open: false }">
        <button
            @click="open = ! open"
            class="inline-block justify-center mx-5 h-11 text-xs text-white bg-blue
            font-semibold rounded border border-blue
            hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
        > Toggle </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
        >Hello 👋</div>
    </div>
</x-test.master-layout>
