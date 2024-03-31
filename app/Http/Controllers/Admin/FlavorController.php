<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlavorStoreRequest;
use App\Http\Requests\FlavorUpdateRequest;
use App\Models\Flavor;
use App\Services\Repository;

class FlavorController extends Controller
{

    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): \Inertia\Response
    {
        $action = 'Lista de Aromas';
        $newBtn = 'Nova Aroma';
        $newRoute = route('flavors.create');

        $flavors = $this->repository->getAllModelsFrom(new Flavor());
        return inertia()->render('Admin/Flavors/FlavorIndex', compact('flavors', 'newBtn', 'newRoute','action'));
    }

    public function showNewFlavorForm(): \Inertia\Response
    {
        $action = 'Cadastrar novo Aroma';
        $formRoute = route('flavors.store');

        return inertia()->render('Admin/Flavors/FlavorForm', compact('action', 'formRoute'));
    }

    public function showEditFlavorForm(Flavor $flavor): \Inertia\Response
    {
        $action = 'Editar Aroma: '. $flavor->name;
        $formRoute = route('flavors.update', $flavor);

        return inertia()->render('Admin/Flavors/FlavorForm', compact('flavor', 'action', 'formRoute'));
    }

    public function storeFlavor(FlavorStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->repository->updateOrStoreModel($request->all(), new \App\Models\Flavor());

        return redirect()->route('flavors.index');

    }

    public function updateFlavor(FlavorUpdateRequest $request, Flavor $flavor): \Illuminate\Http\RedirectResponse
    {
        $this->repository->updateOrStoreModel($request->all(), $flavor);

        return redirect()->route('flavors.index');

    }

    public function destroyFlavor(Flavor $flavor): \Illuminate\Http\RedirectResponse
    {
        $this->repository->destroyModel($flavor);

        return redirect()->route('flavors.index');
    }

}
