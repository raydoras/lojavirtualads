<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nome do Fornecedor:</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">CNPJ:</label>
                        <input type="text" name="cnpj" placeholder="00.000.000/0001-00" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('cnpj') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">E-mail de Contato:</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Telefone (Opcional):</label>
                        <input type="text" name="phone" placeholder="(00) 00000-0000" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('phone') }}">
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-6">
                        <a href="{{ route('suppliers.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" style="background-color:#059669;color:#ffffff;">
                            Salvar Fornecedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>