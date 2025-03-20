<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista zwierząt') }}
        </h2>
    </x-slot>

    <!-- Content -->
    <div class="flex flex-col gap-4">

        <h1>{{ __('Lista Zwierząt') }}</h1>
        <a href="{{ route('pets.create') }}" class="btn btn-primary">{{ __('Dodaj nowe zwierzę') }}</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>{{ __('Imię') }}</th>
                    <th>{{ __('Gatunek') }}</th>
                    <th>{{ __('Wiek') }}</th>
                    <th>{{ __('Opcje') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->species }}</td>
                        <td>{{ $pet->age }}</td>
                        <td>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">{{ __('Edytuj') }}</a>
                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
