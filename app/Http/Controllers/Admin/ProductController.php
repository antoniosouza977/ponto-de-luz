<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Services\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;
use function Symfony\Component\Translation\t;

class ProductController extends Controller
{

    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function showNewProductForm(): Response
    {
        $action = 'Cadastrar Novo Produto';
        $categories = ProductCategory::all();
        $formRoute = route('products.store');

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories', 'formRoute'));
    }

    public function storeNewProduct(ProductStoreRequest $request)
    {
        $product = $this->repository->updateOrStoreModel($request->except('images'), new Product);
        $this->repository->syncManyToManyRelations($product->categories(), $request['categories_ids']);

        try {
            foreach ($request['images'] ?? [] as $key => $img) {
                $path = Storage::disk('public')->putFile('products/imgs', $img);
                ProductImage::create([
                    'path' => $path,
                    'view_order' => $key,
                    'product_id' => $product->id
                ]);

            }

            return back();
        } catch (\Throwable $throwable) {
            dd($throwable);
        }

    }

}
