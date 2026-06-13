<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fornecedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-700">Lista de fornecedores parceiros da loja virtual.</p>
                    <a href="{{ route('suppliers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Novo Fornecedor
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full mt-4 border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 border text-left">Nome</th>
                            <th class="p-3 border text-left">CNPJ</th>
                            <th class="p-3 border text-left">Email</th>
                            <th class="p-3 border text-left">Telefone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $supplier)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border">{{ $supplier->name }}</td>
                                <td class="p-3 border font-mono">{{ $supplier->cnpj }}</td>
                                <td class="p-3 border">{{ $supplier->email }}</td>
                                <td class="p-3 border">{{ $supplier->phone ?? 'Não informado' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 border text-center text-gray-500">Nenhum fornecedor cadastrado ainda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>