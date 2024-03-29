<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Services\Eloquent\ProductQueryBuilder;
use App\Services\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;

class ProductController extends Controller
{

    private Repository $repository;
    private ProductQueryBuilder $productQueryBuilder;

    public function __construct
    (
        Repository          $repository,
        ProductQueryBuilder $productQueryBuilder
    )
    {
        $this->repository = $repository;
        $this->productQueryBuilder = $productQueryBuilder;
    }

    public function index(Request $request): Response
    {
        $action = 'Lista de Produtos';
        $newBtn = 'Novo Produto';
        $newRoute = route('products.create');

        $products = $this->productQueryBuilder->build(new Product(), ['images', 'categories'], $request->all());

        return inertia()->render('Admin/Products/ProductIndex', compact('action', 'newRoute', 'newBtn', 'products'));
    }

    public function showNewProductForm(): Response
    {
        $action = 'Cadastrar Novo Produto';
        $categories = ProductCategory::all();
        $formRoute = route('products.store');

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories', 'formRoute'));
    }

    public function showEditProductForm(Product $product): Response
    {
        $action = 'Editar Produto ' . $product->name;
        $categories = ProductCategory::all();
        $formRoute = route('products.update', $product);
        $product = $this->repository->modelWithRelations($product, ['images', 'categories']);

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories', 'formRoute', 'product'));
    }

    public function updateProduct(ProductStoreRequest $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $product = $this->repository->updateOrStoreModel($request->all(), $product);
        $this->saveProductImages($product, $request['images'] ?? []);

        return redirect()->route('products.index');
    }

    public function storeNewProduct(ProductStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $product = $this->repository->updateOrStoreModel($request->except('images'), new Product);
        $this->repository->syncManyToManyRelations($product->categories(), $request['categories_ids']);

        $this->saveProductImages($product, $request['images'] ?? []);

        return redirect()->route('products.index');
    }

    public function destroyProduct(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->images()->delete();
        $product->delete();

        return back();
    }

    public function destroyImage(ProductImage $image)
    {
        $product = $image->product;
        Storage::disk('public')->delete($image->path);
        $image->delete();
        $product = $product->load('images');

        return $product->images;
    }

    public function saveProductImages(Model $product, array $images): void
    {
        foreach ($images as $key => $img) {

            if (isset($img['id'])) {
                ProductImage::query()->find($img['id'])->update(['view_order' => $key]);
            } else {
                $path = Storage::disk('public')->putFile('products/imgs', $img['file']);
                ProductImage::create([
                    'path' => $path,
                    'view_order' => $key,
                    'product_id' => $product->id
                ]);
            }

        }
    }


}
