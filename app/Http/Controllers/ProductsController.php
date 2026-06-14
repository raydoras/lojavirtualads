<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Models\Supplier; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function create()
    {
        return view('products.create', [
            'types' => Type::all(),
            'suppliers' => Supplier::all() 
        ]);
    }


    public function store(Request $request)
    {
        // alimenta a var $errors na view
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            'type_id' => 'required|exists:types,id',
            'supplier_id' => 'nullable|exists:suppliers,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
        ]);

        $productData = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'supplier_id' => $request->supplier_id, 
            'image' => null 
        ];

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('products', 'public');
            $productData['image'] = $path;
        }

        Product::create($productData);
        
        return redirect('/products')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function index()
    {
        return view('products.index', [
            'products' => Product::with(['type', 'supplier'])->get()
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', [
            'product' => $product, 
            'types' => Type::all(),
            'suppliers' => Supplier::all() 
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|gt:0',
            'price' => 'required|gt:0',
            'type_id' => 'required|exists:types,id',
            'supplier_id' => 'nullable|exists:suppliers,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
        ]);

        $product = Product::find($request->id);

        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'supplier_id' => $request->supplier_id 
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $updateData['image'] = $path;
        } elseif ($request->has('remove_image') && $request->remove_image) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $updateData['image'] = null;
        }

        $product->update($updateData);

        return redirect('/products')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect('/products')->with('success', 'Produto excluído com sucesso!');
    }
}