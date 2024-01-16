<x-app-layout>
    <form method="POST" action="{{ route('articulos.store') }}">
        @csrf

        <!-- Nombre libro -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Autor libro -->
        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor')"
                required autofocus autocomplete="autor" />
            <x-input-error :messages="$errors->get('autor')" class="mt-2" />
        </div>

        <!-- precio libro -->
        <div>
            <x-input-label for="precio" :value="__('Precio')" />
            <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')"
                required autofocus autocomplete="precio" />
            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>

        <!-- Categoria libro -->
        <div>
            <x-input-label for="categoria_id" :value="__('Categoria')" />
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                {{ old('categia_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Crear') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
