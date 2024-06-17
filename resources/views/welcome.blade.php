<!-- resources/views/welcome.blade.php -->
<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-red-300 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="text-center mt-10 text-3xl font-bold text-yellow-400 mb-8" style="font-family: 'Press Start 2P', cursive;">
                Liste des Pokémon
            </div>

            <form method="GET" action="{{ route('pokedex.index') }}" class="mb-8 flex justify-center space-x-4">
                <input type="text" name="search" placeholder="Rechercher un Pokémon" class="bg-white border border-gray-300 rounded px-4 py-2" value="{{ request('search') }}">
                <select name="primary_type" class="bg-white border border-gray-300 rounded px-4 py-2">
                    <option value="">Type Primaire</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ request('primary_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <select name="secondary_type" class="bg-white border border-gray-300 rounded px-4 py-2">
                    <option value="">Type Secondaire</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ request('secondary_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Rechercher</button>
            </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($pokemons as $pokemon)
                    <a href="{{ route('pokedex.show', $pokemon->id) }}" class="block">
                        <x-card>
                            <div class="flex justify-center mb-4">
                                <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-32 object-cover rounded">
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-bold">{{ $pokemon->name }}</h3>
                                <p class="text-gray-600">N° {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                                <div class="mt-2 flex justify-center space-x-2">
                                <span class="text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded" style="background-color: {{ $pokemon->primaryType->color }};">{{ $pokemon->primaryType->name }}</span>
                                @if ($pokemon->secondaryType)
                                    <span class="text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded" style="background-color: {{ $pokemon->secondaryType->color }};">{{ $pokemon->secondaryType->name }}</span>
                                @endif
                                </div>
                                <div class="mt-2 text-left">
                                    <p class="text-sm"><strong>Point de vie:</strong> {{ $pokemon->hp }}</p>
                                    <p class="text-sm"><strong>Poids:</strong> {{ $pokemon->weight }} kg</p>
                                    <p class="text-sm"><strong>Taille:</strong> {{ $pokemon->height }} m</p>
                                </div>
                            </div>
                        </x-card>
                    </a>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $pokemons->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-guest-layout>
