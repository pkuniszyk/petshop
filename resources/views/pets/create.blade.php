<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj nowe zwierzę') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 ">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">{{ __('Dodaj nowe zwierzę') }}</h2>
        
        <form action="{{ route('pets.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-gray-600 font-semibold">{{ __('Imię') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-2 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="species" class="block text-gray-600 font-semibold">{{ __('Gatunek') }}</label>
                <input type="text" id="species" name="species" value="{{ old('species') }}" required class="mt-2 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                @error('species')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="age" class="block text-gray-600 font-semibold">{{ __('Wiek') }}</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" required class="mt-2 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                @error('age')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('Dodaj zwierzę') }}
                </button>
                <a href="{{ route('pets.index') }}" class="text-gray-500 hover:text-blue-700">{{ __('Powrót do listy zwierząt') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
