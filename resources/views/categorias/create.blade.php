<x-guest-layout>
        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf

            <!-- Nombre Categoría -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Crear') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>
