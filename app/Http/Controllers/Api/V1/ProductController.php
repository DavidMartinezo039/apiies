<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->paginate(9);

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        /*
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::uuid() . '.' . $file->extension();
            $file->storeAs('categories', $name, 'public');
            $data['photo'] = $name;
        }
        */


        $product = Product::create($data);
        return new ProductResource($product);
    }

    public function update(Product $product, StoreProductRequest $request)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        //return response(null, Response::HTTP_NO_CONTENT);
        return response()->noContent();
    }

    public function list()
    {
        return ProductResource::collection(Product::all());
    }

    public function getProductsByCategory($categoryId)
    {
        // Verificar si la categoría existe
        $category = Category::findOrFail($categoryId);

        // Obtener los productos asociados a la categoría
        $products = $category->products;

        // Retornar la respuesta, puedes adaptarla según tus necesidades
        return response()->json([
            'category' => $category,
        ]);
    }
}
