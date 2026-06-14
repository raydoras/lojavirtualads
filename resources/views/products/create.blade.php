<x-app-layout>

    <form class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('products/new') }}" method="POST" enctype="multipart/form-data"> @csrf

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Cadastrar Produto</h1>

        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Nome:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" required name="name" type="text" />
        <label class="block mb-1 text-gray-700 dark:text-gray-300">Descrição:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="description" type="textarea" />
        <label class="block mb-1 text-gray-700 dark:text-gray-300">Quantidade:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="quantity" type="number" />
        <label class="block mb-1 text-gray-700 dark:text-gray-300">Preço:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="price" type="number" />

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Tipo do produto:</label>
        <select class="w-full p-2 mb-4 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" name="type_id">
            <option value="">Selecione</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Fornecedor:</label>
        <select name="supplier_id" class="w-full p-2 mb-4 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            <option value="">Selecione um fornecedor (Opcional)</option>
            @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Imagem do Produto:</label>
            <input type="file" name="image" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
        </div>

        <input class="w-full p-2 rounded bg-blue-600 text-white" type="submit" value="Salvar" />
    </form>

</x-app-layout>