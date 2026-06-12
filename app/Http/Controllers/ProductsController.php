<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function create()
    {
        return view('products.create', ['types' => Type::all()]);
    }

    //função chamada no submit do form..
    //será um POST com os dados
    public function store(Request $request)
    {
        //alimenta a var $errors na view
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            'type_id' => 'required|exists:types,id'
        ]);

        //dd($request->all());
        //não esquecer import do Product model.
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        //usaremos flash session messages
        return redirect('/products')->with('success', 'Produto cadastrado!');
    }

    //função que irá mostrar a view de listagem
    //passando como parâmetro a consulta no banco com ::all()
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            'type_id' => 'required|exists:types,id'
        ]);

        $product = Product::find($request->id);
        //método update faz um update product set name = ? etc...
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        return redirect('/products')->with('success', 'Produto atualizado
com sucesso!');
    }

    public function destroy($id)
    {
        //select * from product where id = ?
        $product = Product::find($id);
        //deleta o produto no banco
        $product->delete();
        return redirect('/products')->with('success', 'Produto
excluído com sucesso!');
    }
}
