<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()
                    ->products()
                    ->latest()
                    ->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return response()->json($product);
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
