<x-app-layout>
    <h1 class="text-3x1 font-bold text-center text-gray-800 mt-4">{{ $articulo->nombre }}</h1>
    <div class="flex justify-center mt-4">
        <img src="{{ asset('storage/' . $articulo->ruta_imagen) }}" alt="Imagen del libro Historia de las Civilizaciones">
    </div>
    <div class="flex justify-center mt-4">
        <ol>
            <li>Autor: {{ $articulo->autor }}</li>
            <li>Precio: {{ number_format($articulo->precio, 2, '.', ',') . ' €' }}</li>
            <li>Categoria: {{ $articulo->categoria->name }}</li>
        </ol>
    </div>
    <x-primary-button class="ms-4">
        <a href="{{ route('articulos.cambiar_imagen', ['articulo' => $articulo]) }}">{{ __('Cambiar imagen') }}</a>
    </x-primary-button>
</x-app-layout>
