<x-app-layout>


<form class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('products/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $product['id'] }}">

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name', $product['name'])" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Descrição')" />
            <x-text-input id="description" name="description" type="text" class="block mt-1 w-full" :value="old('description', $product['description'])" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="quantity" :value="__('Quantidade')" />
            <x-text-input id="quantity" name="quantity" type="number" class="block mt-1 w-full" :value="old('quantity', $product['quantity'])" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="price" :value="__('Preço')" />
            <x-text-input id="price" name="price" type="number" class="block mt-1 w-full" :value="old('price', $product['price'])" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="type_id" :value="__('Tipo do produto')" />
            <select id="type_id" name="type_id" class="block mt-1 w-full rounded border border-gray-300 dark:bg-gray-700 dark:text-white p-2">
                <option value="">Selecione</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}" @selected(old('type_id', $product->type_id) == $type->id)>
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Fornecedor:</label>
            <select name="supplier_id" class="block mt-1 w-full rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2">
                <option value="">Selecione um fornecedor (Opcional)</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Imagem atual:</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagem do produto" class="w-32 h-32 object-cover rounded border border-gray-300 dark:border-gray-600 mb-3">
                <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300 mb-3">
                    <input type="checkbox" name="remove_image" value="1" class="form-checkbox text-blue-600 rounded mr-2">
                    Remover imagem atual
                </label>
            @else
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Nenhuma imagem cadastrada.</p>
            @endif
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Substituir imagem:</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded p-2" />
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Escolha um arquivo para alterar a imagem do produto.</p>
        </div>

        <div class="mt-6">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</x-app-layout>