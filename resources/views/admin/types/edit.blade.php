<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Modifier un type
                </div>
            </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('types.update', $type) }}" class="flex flex-col space-y-4"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $type)" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="color" :value="__('Couleur')" />
                        <x-text-input id="color" class="block mt-1 w-full" type="text" name="color"
                            :value="old('color', $type)"/>
                        <x-input-error :messages="$errors->get('color')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="img_path" :value="__('Image')" />
                        @if ($type->img_path)
                            <img src="{{ asset('storage/' . $type->img_path) }}" alt="Image du type" class="aspect-auto h-20 rounded shadow mt-2 mb-4 object-cover object-center">
                        @endif
                        <x-text-input id="img_path" class="block mt-1 w-full" type="file" name="img_path" />
                        <x-input-error :messages="$errors->get('img')" class="mt-2" />
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