<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource with filters.
     */
    public function index(Request $request)
    {
        $query = Product::query()->with('customPrices.partner');

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has(['start_date', 'end_date'])) {
            $query->whereBetween('created_at', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $sortField = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_dir', 'desc');
        $query->orderBy($sortField, $sortDirection);

        $perPage = $request->get('per_page', 10);
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'document' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'category']);

        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('public/product_docs');
            $data['document'] = str_replace('public/', 'storage/', $path);
        }

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'category' => 'sometimes|string|max:100',
            'document' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);


        $product->fill($request->only(['title', 'description', 'category']));

        if ($request->hasFile('document')) {
            if ($product->document) {
                Storage::delete(str_replace('storage/', 'public/', $product->document));
            }
            
            $path = $request->file('document')->store('public/product_docs');
            $product->document = str_replace('public/', 'storage/', $path);
        }

        $product->save();

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->document) {
        Storage::delete(str_replace('storage/', 'public/', $product->document));
    }

    $product->delete();

    return response()->json([
        'success' => true,
        'message' => 'Product moved to trash successfully'
    ]);
}
}