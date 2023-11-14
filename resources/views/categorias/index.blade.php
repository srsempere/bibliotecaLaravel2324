<x-guest-layout>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $categoria->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-guest-layout>
