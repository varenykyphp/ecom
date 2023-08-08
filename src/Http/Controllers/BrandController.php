<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\Brand;
use VarenykyECom\Repositories\BrandRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Varenyky\Http\Controllers\BaseController;

class BrandController extends BaseController
{
    
    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = $this->repository->getAllPaginated();

        return view('VarenykyECom::brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('VarenykyECom::brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $this->repository->create($create);

        return redirect()->route('admin.brands.index')->with('success', __('VarenykyECom::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {   
        return view('VarenykyECom::brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand): RedirectResponse
    {

        $update = array_filter($request->except(['_token', '_method']));

        $this->repository->update($brand->id, $update);

        return redirect()->route('admin.brands.edit', $brand->id)->with('success', __('VarenykyECom::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', __('VarenykyECom::labels.deleted'));
    }
}
