<x-app-layout>
    <form class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Editar Fornecedor</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="name">Nome:</label>
            <input id="name" name="name" type="text" value="{{ old('name', $supplier->name) }}" required class="block w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="cnpj">CNPJ:</label>
            <input id="cnpj" name="cnpj" type="text" value="{{ old('cnpj', $supplier->cnpj) }}" required maxlength="18" class="block w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="email">Email:</label>
            <input id="email" name="email" type="email" value="{{ old('email', $supplier->email) }}" required class="block w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="phone">Telefone (Opcional):</label>
            <input id="phone" name="phone" type="text" value="{{ old('phone', $supplier->phone) }}" maxlength="15" class="block w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" />
        </div>

        <div class="flex items-center justify-end gap-4 mt-6">
            <a href="{{ route('suppliers.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
        </div>
    </form>
</x-app-layout>
