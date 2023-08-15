<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\TaxClass;
use VarenykyECom\Repositories\TaxClassRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaxClassController extends Controller
{
    
    public function __construct(TaxClassRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $taxclasses = $this->repository->getAllPaginated();

        return view('VarenykyECom::taxclasses.index', compact('taxclasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('VarenykyECom::taxclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);

        $this->repository->create($create);

        return redirect()->route('admin.taxclasses.index')->with('success', __('VarenykyECom::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxClass $taxclass): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxClass $taxclass): View
    {   
        return view('VarenykyECom::taxclasses.edit', compact('taxclass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaxClass $taxclass): RedirectResponse
    {

        $update = array_filter($request->except(['_token', '_method']));

        $this->repository->update($taxclass->id, $update);

        return redirect()->route('admin.taxclasses.edit', $taxclass->id)->with('success', __('VarenykyECom::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxClass $taxclass): RedirectResponse
    {
        $taxclass->delete();

        return redirect()->route('admin.taxclasses.index')->with('success', __('VarenykyECom::labels.deleted'));
    }
}
