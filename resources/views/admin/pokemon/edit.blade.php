<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Pokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class="text-2xl">
                    Modifier le Pokémon : {{ $pokemon->name }}
                </div>
            </div>

            <form method="POST" action="{{ route('pokemons.update', $pokemon->id) }}" class="flex flex-col space-y-4 text-gray-500" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name', $pokemon->name)" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="hp" :value="__('Point de vie')" />
                    <x-text-input id="hp" class="block mt-1 w-full" type="number" name="hp"
                        :value="old('hp', $pokemon->hp)" />
                    <x-input-error :messages="$errors->get('hp')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="weight" :value="__('Poids')" />
                    <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight"
                        :value="old('weight', $pokemon->weight)" />
                    <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="height" :value="__('Taille')" />
                    <x-text-input id="height" class="block mt-1 w-full" type="number" name="height"
                        :value="old('height', $pokemon->height)" />
                    <x-input-error :messages="$errors->get('height')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="img_path" :value="__('Image')" />
                    <x-text-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                    <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                    @if($pokemon->img_path)
                        <img src="{{ Storage::url($pokemon->img_path) }}" alt="Image de {{ $pokemon->name }}" class="max-h-32 mt-4">
                    @endif
                </div>

                <div>
                    <x-input-label for="primary_type_id" :value="__('Type primaire')" />
                    <select id="primary_type_id" name="primary_type_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Sélectionnez un type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $pokemon->primary_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('primary_type_id')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="secondary_type_id" :value="__('Type secondaire')" />
                    <select id="secondary_type_id" name="secondary_type_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Sélectionnez un type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $pokemon->secondary_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('secondary_type_id')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        {{ __('Modifier') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
