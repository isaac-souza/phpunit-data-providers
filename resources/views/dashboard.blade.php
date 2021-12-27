<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12">
                <div class="col-span-5 p-6">
                    <span class="text-lg">Create a new customer</span>
                </div>
                <div class="col-span-7">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <x-input/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
