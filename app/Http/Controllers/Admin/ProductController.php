<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Flavor;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Services\Eloquent\ProductQueryBuilder;
use App\Services\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

        $products = $this->productQueryBuilder->build(new Product(), ['images', 'categories', 'flavors'], $request->all(), true, 6);

        return inertia()->render('Admin/Products/ProductIndex', compact('action', 'newRoute', 'newBtn', 'products'));
    }

    public function showNewProductForm(): Response
    {
        $action = 'Cadastrar Novo Produto';
        $categories = $this->repository->getAllModelsFrom(new ProductCategory());
        $flavors = $this->repository->getAllModelsFrom(new Flavor());
        $formRoute = route('products.store');

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories', 'formRoute', 'flavors'));
    }

    public function showEditProductForm(Product $product): Response
    {
        $action = 'Editar Produto: ' . $product->name;
        $categories = $this->repository->getAllModelsFrom(new ProductCategory());
        $flavors = $this->repository->getAllModelsFrom(new Flavor());
        $formRoute = route('products.update', $product);
        $product = $this->repository->modelWithRelations($product, ['images', 'categories', 'flavors']);

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories', 'formRoute', 'product', 'flavors'));
    }

    public function updateProduct(ProductUpdateRequest $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $product = $this->repository->updateOrStoreModel($request->all(), $product);
        $this->saveProductImages($product, $request['images'] ?? []);
        $this->repository->syncManyToManyRelations($product->categories(), $request['categories_ids']);
        $this->repository->syncManyToManyRelations($product->flavors(), $request['flavors_ids']);

        return redirect()->route('products.index');
    }

    public function storeNewProduct(ProductStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $product = $this->repository->updateOrStoreModel($request->except('images'), new Product);
        $this->saveProductImages($product, $request['images'] ?? []);
        $this->repository->syncManyToManyRelations($product->categories(), $request['categories_ids']);
        $this->repository->syncManyToManyRelations($product->flavors(), $request['flavors_ids']);

        return redirect()->route('products.index');
    }

    public function destroyProduct(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->images()->delete();
        $product->flavors()->detach();
        $product->categories()->detach();
        Storage::disk('public')->deleteDirectory('product_images/product_id_' . $product->id);
        $product->delete();

        return redirect()->route('products.index');
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
                $path = Storage::disk('public')->putFile('product_images/product_id_' . $product->id . '/', $img['file']);
                ProductImage::create([
                    'path' => $path,
                    'view_order' => $key,
                    'product_id' => $product->id
                ]);
            }

        }
    }


}
