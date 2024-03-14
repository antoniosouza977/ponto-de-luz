<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function showNewProductForm()
    {
        $action = 'Cadastrar Novo Produto';
        $categories = ProductCategory::all();

        return inertia()->render('Admin/Products/ProductForm', compact('action', 'categories'));
    }

}
