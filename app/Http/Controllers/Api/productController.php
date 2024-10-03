<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $data = [
                "message" => "No products are registered",
                "status" => 200
            ];
            return response()->json($data, 200);
        }

        $data = [
            "products" => $products,
            "status" => 200
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            $data = [
                "message" => "No product found",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            "product" => $product,
            "status" => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|unique:product|max:255",
            "description" => "required|string|max:1000",
            "price" => "required|numeric|min:0",
            "stock_quantity" => "required|integer|min:0",
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Validation error",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $products = Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "stock_quantity" => $request->stock_quantity
        ]);

        if (!$products) {
            $data = [
                "message" => "Product creation error",
                "status" => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            "products" => $products,
            "status" => 201
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            $data = [
                "message" => "No product found",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        if ($request->isMethod('put')) {
            $validator = Validator::make($request->all(), [
                "name" => "required|string|unique:product|max:255",
                "description" => "required|string|max:1000",
                "price" => "required|numeric|min:0",
                "stock_quantity" => "required|integer|min:0",
            ]);
        } elseif ($request->isMethod('patch')) {
            $validator = Validator::make($request->all(), [
                "name" => "sometimes|string|unique:product|max:255",
                "description" => "sometimes|string|max:1000",
                "price" => "sometimes|numeric|min:0",
                "stock_quantity" => "sometimes|integer|min:0",
            ]);
        }

        if ($validator->fails()) {
            $data = [
                "message" => "Validation error",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $product->update($request->all());

        $data = [
            "product" => $product,
            "status" => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            $data = [
                "message" => "No product found",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $product->delete();

        $data = [
            "message" => "Product deleted",
            "status" => 200
        ];

        return response()->json($data, 200);
    }
};
