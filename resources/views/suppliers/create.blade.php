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
                        <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('cnpj') }}" required maxlength="18">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">E-mail de Contato:</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Telefone (Opcional):</label>
                        <input type="text" id="phone" name="phone" placeholder="(00) 00000-0000" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" value="{{ old('phone') }}" maxlength="15">
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

    <script>
        // Formatar CNPJ
        document.getElementById('cnpj').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 14) {
                value = value.slice(0, 14);
            }
            if (value.length > 0) {
                if (value.length <= 2) {
                    e.target.value = value;
                } else if (value.length <= 5) {
                    e.target.value = value.slice(0, 2) + '.' + value.slice(2);
                } else if (value.length <= 8) {
                    e.target.value = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5);
                } else if (value.length <= 12) {
                    e.target.value = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5, 8) + '/' + value.slice(8);
                } else {
                    e.target.value = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5, 8) + '/' + value.slice(8, 12) + '-' + value.slice(12);
                }
            }
        });

        // Formatar Telefone
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            if (value.length > 0) {
                if (value.length <= 2) {
                    e.target.value = '(' + value;
                } else if (value.length <= 7) {
                    e.target.value = '(' + value.slice(0, 2) + ') ' + value.slice(2);
                } else {
                    e.target.value = '(' + value.slice(0, 2) + ') ' + value.slice(2, 7) + '-' + value.slice(7);
                }
            }
        });
    </script>
</x-app-layout>