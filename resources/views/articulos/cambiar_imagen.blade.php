<x-app-layout>
    <div class="flex justify-center mt-8">
        <form action="{{ route('articulos.guardar_imagen', ['articulo' => $articulo]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="file" name="imagen" id="imagen">
            <button type="submit">Subir imagen</button>
        </form>
    </div>
</x-app-layout>
