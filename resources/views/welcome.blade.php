<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-red-300 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="text-center mt-10 text-3xl font-bold text-yellow-400 mb-8" style="font-family: 'Press Start 2P', cursive;">
                Liste des Pokémon
            </div>
            <div class="flex justify-center mb-6">
                <form method="GET" action="{{ route('pokedex.index') }}" class="w-full max-w-md">
                    <div class="flex items-center border-b-2 border-yellow-500 py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="search" placeholder="Rechercher un Pokémon" value="{{ request('search') }}">
                        <button class="flex-shrink-0 bg-yellow-500 hover:bg-yellow-700 border-yellow-500 hover:border-yellow-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                            Rechercher
                        </button>
                    </div>
                </form>
            </div>
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
