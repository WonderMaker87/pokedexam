<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attacks') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Modifier une attaque
                </div>
            </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('attacks.update', $attack) }}" class="flex flex-col space-y-4"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $attack)" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="damage" :value="__('Dommage')" />
                        <x-text-input id="damage" class="block mt-1 w-full" type="number" name="damage"
                            :value="old('damage', $attack)"/>
                        <x-input-error :messages="$errors->get('damage')" class="mt-2" />
                    </div>
                    
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                            :value="old('description', $attack)"/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="img_path" :value="__('Image')" />
                        @if ($attack->img_path)
                            <img src="{{ asset('storage/' . $attack->img_path) }}" alt="Image de l'attaque" class="aspect-auto h-20 rounded shadow mt-2 mb-4 object-cover object-center">
                        @endif
                        <x-text-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                        <x-input-error :messages="$errors->get('img')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="type_id" :value="__('Type')" />
                        <select id="type_id" name="type_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Sélectionnez un type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ (old('type_id', $attack->type_id) == $type->id) ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
                    </div>


                    <div class="flex justify-end">
                        <x-primary-button type="submit">
                            {{ __('Modifier') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>