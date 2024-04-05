<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Display all products.',
            'data' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
            'price' => 'required|decimal:2|gt:0',
            'qty' => 'required|numeric|gte:0',
        ]);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => Product::create($form_fields)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'message' => 'Display product with ID: ' . $id,
            'data' => Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form_fields = $request->validate([
            'name',
            'desc' => 'nullable',
            'price' => 'decimal:2|gt:0',
            'qty' => 'numeric|gte:0',
        ]);

        return response()->json([
            'message' => 'Product with ID: ' . $id . ' updated successfully',
            'data' => Product::find($id)->update($form_fields)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json([
            'message' => 'Product with ID: ' . $id . ' deleted successfully',
        ]);
    }
}
