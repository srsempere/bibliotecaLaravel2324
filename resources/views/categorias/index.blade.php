<x-guest-layout>
    @foreach ($categorias as $categoria)
        {{ $categoria->name }}
    @endforeach
</x-guest-layout>
