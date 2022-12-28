<x-test.master-layout>
    <livewire:ideas-index-test />

    @prepend('page-script')
        <script>
            console.log('Inside idea index page');
        </script>
    @endprepend
</x-test.master-layout>
