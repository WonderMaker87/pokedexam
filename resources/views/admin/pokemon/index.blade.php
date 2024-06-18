<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between mt-8">
                        <div class="text-2xl">
                            Liste des Pokémon
                        </div>

                        <div class="flex items-center justify-center space-x-8">
                            <a href="{{ route('pokemons.create') }}"
                                class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition">Ajouter un Pokémon</a>
                        </div>
                    </div>

                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="uppercase text-left">
                                    <th class="px-4 py-2 border">Nom</th>
                                    <th class="px-4 py-2 border">Point de vie</th>
                                    <th class="px-4 py-2 border">Poids</th>
                                    <th class="px-4 py-2 border">Taille</th>
                                    <th class="px-4 py-2 border">Image</th>
                                    <th class="px-4 py-2 border">Type primaire</th>
                                    <th class="px-4 py-2 border">Type secondaire</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pokemons as $pokemon)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">{{ $pokemon->name }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->hp }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->weight }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->height }}</td>
                                        <td class="border px-4 py-2">
                                            <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="max-h-10">
                                        </td>
                                        <td class="border px-4 py-2">{{ $pokemon->primaryType->name }}</td>
                                        <td class="border px-4 py-2">{{ $pokemon->secondaryType->name ?? 'N/A' }}</td>
                                        <td class="border px-4 py-2 space-x-4">
                                            <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="text-blue-400">
                                                <x-heroicon-o-pencil class="w-5 h-5" />
                                            </a>
                                            <button x-data="{ id: {{ $pokemon->id }} }"
                                                x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-pokemon-deletion');"
                                                type="submit" class="text-red-400">
                                                <x-heroicon-o-trash class="w-5 h-5"/>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $pokemons->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-modal name="confirm-pokemon-deletion" focusable>
            <form method="post" onsubmit="event.target.action= '/admin/pokemons/' + window.selected" class="p-6">
                @csrf
                @method('DELETE')

                <h2 class="text-lg font-medium text-gray-900">
                    Êtes-vous sûr de vouloir supprimer ce Pokémon ?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Cette action est irréversible. Toutes les données seront supprimées.
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Annuler
                    </x-secondary-button>

                    <x-danger-button class="ml-3" type="submit">
                        Supprimer
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
