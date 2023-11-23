<x-app-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                    <th scope="col" class="px-6 py-3 text-center align-middle" colspan="2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $categoria->name }}
                        </td>
                        <td class="px-6 py-4">
                           <a href="{{ route('categorias.edit',['categoria' => $categoria]) }}">
                            <x-primary-button class=bg-blue-600>Editar</x-primary-button>
                        </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('categorias.destroy', ['categoria' => $categoria]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-700">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('categorias.create') }}" method="get">
        <x-primary-button class="bg-green-700 m-4">Crear categoría</x-primary-button>
    </form>

</x-app-layout>
