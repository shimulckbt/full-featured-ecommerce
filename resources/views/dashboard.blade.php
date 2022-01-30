<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h3>Hi..{{Auth::user()->name}}</h3>
        </h2>
    </x-slot>

    <div class="py-12">
        <h1>This Is Wlcome Page</h1>
    </div>
</x-app-layout>