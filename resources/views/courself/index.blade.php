<x-app-layout>
    <div class='py-12'>
        @livewire('courself-index')

        {{ auth()->user()->courses }}

    </div>
</x-app-layout>
