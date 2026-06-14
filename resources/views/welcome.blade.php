<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual ADS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600">LojaVirtual<span class="text-gray-700">ADS</span></a>
            
            <div>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600">Painel Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600">Entrar</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm font-semibold bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">Cadastrar-se</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
            <form action="/" method="GET" class="flex flex-col sm:flex-row items-center gap-4">
                <label for="type_id" class="font-medium text-gray-700 whitespace-nowrap">Filtrar por Categoria:</label>
                <select name="type_id" id="type_id" class="w-full sm:w-64 border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:border-blue-500">
                    <option value="">Todos os produtos</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">
                    Filtrar
                </button>
            </form>
        </div>

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Nossos Produtos</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition">
                    
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="text-gray-400 text-sm italic">Sem imagem disponível</div>
                        @endif
                    </div>

                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold text-blue-600 uppercase tracking-wide">{{ $product->type->name }}</span>
                            <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $product->description ?? 'Sem descrição.' }}</p>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-xl font-extrabold text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Qtd: {{ $product->quantity }}</span>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-lg border border-dashed border-gray-300">
                    Nenhum produto encontrado para os critérios selecionados.
                </div>
            @endforelse
        </div>

    </main>

    <footer class="bg-white border-t border-gray-200 mt-12 py-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} - Projeto Loja Virtual - Disciplina de Tópicos Especiais em Desenvolvimento de Software
    </footer>

</body>
</html>