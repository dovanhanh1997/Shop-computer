<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Product;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $product = $this->productService->getAll();

        return ProductResource::collection($product);
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);

        return new ProductResource($product);

    }

    public function store(Request $request)
    {
        $product = $request->isMethod('PUT') ?
            $this->productService->findById($request->id) :
            new Product();

        $product->id = $request->input('id');
        $product->productName = $request->input('productName');
        $product->productPrice = $request->input('productPrice');

        if ($product->save()){
            return new ProductResource($product);
        }
    }

    public function destroy($id)
    {
        $product = $this->productService->findById($id);

        if ($product->delete()){
            return new ProductResource($product);
        }
    }
}
