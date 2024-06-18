<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between mt-8">
                        <div class=" text-2xl">
                            Liste des types
                        </div>

                        <div class="flex  items-center justify-center space-x-8">
                            <a href="{{ route('types.create') }}"
                                class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition">Ajouter un type</a>
                        </div>
                    </div>

                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="uppercase text-left">
                                    <th class="px-4 py-2 border">Nom</th>
                                    <th class="px-4 py-2 border">Couleur</th>
                                    <th class="px-4 py-2 border">Images</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">
                                            {{ $type->name }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $type->color }}</td>
                                        <td class="border px-4 py-2">
                                        <img src="{{ Storage::url($type->img_path) }}" alt="illustration du type" class="max-h-10"></td>
                                        <td class="border px-4 py-2 space-x-4">
                                            <a href="{{ route('types.edit', $type->id) }}"
                                                class="text-blue-400"><x-heroicon-o-pencil class="w-5 h-5" /></a>

                                            <button x-data="{ id: {{ $type->id }} }"
                                                x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-type-deletion');"
                                                type="submit" class="text-red-400"><x-heroicon-o-trash class="w-5 h-5"/></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $types->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-modal name="confirm-type-deletion" focusable>
            <form method="post" onsubmit="event.target.action= '/admin/types/' + window.selected" class="p-6">
                @csrf
                @method('DELETE')

                <h2 class="text-lg font-medium text-gray-900">
                    Êtes-vous sûr de vouloir supprimer ce type ?
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