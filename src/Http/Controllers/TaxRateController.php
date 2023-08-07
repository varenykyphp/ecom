<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\TaxRate;
use VarenykyECom\Models\TaxClass;
use VarenykyECom\Repositories\TaxRateRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaxRateController extends BaseController
{
    
    public function __construct(TaxRateRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $taxrates = $this->repository->getAllPaginated();

        return view('VarenykyECom::taxrates.index', compact('taxrates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $classes = TaxClass::all();
        
        return view('VarenykyECom::taxrates.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $this->repository->create($create);

        return redirect()->route('admin.taxrates.index')->with('success', __('VarenykyECom::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxRate $taxrate): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxRate $taxrate): View
    {   
        $classes = TaxClass::all();
        
        return view('VarenykyECom::taxrates.edit', compact('classes', 'taxrate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaxRate $taxrate): RedirectResponse
    {

        $update = array_filter($request->except(['_token', '_method']));

        $this->repository->update($taxrate->id, $update);

        return redirect()->route('admin.taxrates.edit', $taxrate->id)->with('success', __('VarenykyECom::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxRate $taxrate): RedirectResponse
    {
        $taxrate->delete();

        return redirect()->route('admin.taxrates.index')->with('success', __('VarenykyECom::labels.deleted'));
    }
}
