<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;

class PublicHomeController extends Controller
{
    public function index(Request $request)
    {
        $types = Type::all();

        $query = Product::query();

        if ($request->has('type_id') && $request->type_id != '') {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->get();

        return view('welcome', compact('products', 'types'));
    }
}
