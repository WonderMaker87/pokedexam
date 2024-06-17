<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mb-4">
                <div class="text-2xl">
                    {{ $pokemon->name }}
                </div>
                <div>
                    <a href="{{ route('pokedex.index') }}" class="text-blue-500 hover:underline">Retour à la liste</a>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="h-80 object-cover rounded mb-4">
                <h3 class="text-xl font-bold">N° {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</h3>
                <div class="mt-2 flex justify-center space-x-2">
                    <span class="text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded" style="background-color: {{ $pokemon->primaryType->color }};">{{ $pokemon->primaryType->name }}</span>
                    @if ($pokemon->secondaryType)
                        <span class="text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded" style="background-color: {{ $pokemon->secondaryType->color }};">{{ $pokemon->secondaryType->name }}</span>
                    @endif
                </div>
                <div class="mt-4 text-left">
                    <p class="text-sm"><strong>Point de vie:</strong> {{ $pokemon->hp }}</p>
                    <p class="text-sm"><strong>Poids:</strong> {{ $pokemon->weight }} kg</p>
                    <p class="text-sm"><strong>Taille:</strong> {{ $pokemon->height }} m</p>
                </div>
                <div class="mt-4 text-left w-full">
                    <h4 class="text-lg font-bold">Attaques disponibles:</h4>
                    <ul class="list-none p-0">
                        @foreach ($pokemon->primaryType->attacks as $attack)
                            <li class="flex text-white px-2 py-2 rounded mb-1 items-center" style="background-color: {{ $pokemon->primaryType->color }};" title="{{ $attack->description }}">
                                <img src="{{ Storage::url($attack->img_path) }}" alt="Image de {{ $attack->name }}" class="h-12 w-12 mr-2">
                                <div>
                                    <p class="font-semibold">{{ $attack->name }} ({{ $attack->type->name }})</p>
                                    <p class="text-sm">Dégâts: {{ $attack->damage }}</p>
                                </div>
                            </li>
                        @endforeach
                        @if ($pokemon->secondaryType)
                            @foreach ($pokemon->secondaryType->attacks as $attack)
                                <li class="flex text-white px-2 py-2 rounded mb-1 items-center" style="background-color: {{ $pokemon->secondaryType->color }};" title="{{ $attack->description }}">
                                    <img src="{{ Storage::url($attack->img_path) }}" alt="Image de {{ $attack->name }}" class="h-12 w-12 mr-2">
                                    <div>
                                        <p class="font-semibold">{{ $attack->name }} ({{ $attack->type->name }})</p>
                                        <p class="text-sm">Dégâts: {{ $attack->damage }}</p>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
