<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All properties') }}
        </h2>
    </x-slot>

    <div class="py-6" style="max-width: 700px; margin: auto">
        @foreach($properties as $property)
            @include('components.card')
        @endforeach

        <div class="py-6" style="max-width: 200px; min-width: 100px; margin: auto">
            {{ $properties->links() }}
        </div>
    </div>
</x-app-layout>
