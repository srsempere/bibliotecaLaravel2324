<x-app-layout>
    <form method="POST" action="{{ route('articulos.update', ['articulo' => $articulo]) }}">
        @csrf
        @method('PUT')
        <!-- Nombre del libro -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $articulo->nombre)" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Autor del libro -->
        <div>
            <x-input-label for="autor" :value="__('Autor')" />
            <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor', $articulo->autor)" required autofocus autocomplete="autor" />
            <x-input-error :messages="$errors->get('autor')" class="mt-2" />
        </div>

         <!-- Precio del libro -->
         <div>
            <x-input-label for="precio" :value="__('Precio')" />
            <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio', $articulo->precio)" required autofocus autocomplete="precio" />
            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>

         <!-- Categoria del libro -->

         <div>
            <x-input-label for="categoria_id" :value="__('Categoria')" />
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $articulo->categoria_id) == $categoria->id  ? 'selected' : '' }}>
                        {{ $categoria->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Editar') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
