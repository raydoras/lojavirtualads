<x-app-layout>
    <div class="w-full max-w-4xl bg-white dark:bg-gray-800 p-6 rounded-lg shadow mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Fornecedores</h1>
            <a href="{{ route('suppliers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cadastrar</a>
        </div>

        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Nome</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">CNPJ</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Telefone</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                        <tr class="border-b border-gray-300 dark:border-gray-600">
                            <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->name }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-white font-mono">{{ $supplier->cnpj }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->email }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->phone ?? 'Não informado' }}</td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('suppliers.edit', $supplier) }}" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">Editar</a>
                                    <a href="{{ route('suppliers.destroy', $supplier) }}" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Excluir</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Nenhum fornecedor cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>