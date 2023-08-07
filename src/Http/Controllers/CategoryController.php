<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\Category;
use VarenykyECom\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = $this->repository->getAllPaginated();

        return view('VarenykyECom::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $parents = Category::all();

        return view('VarenykyECom::categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $create = $request->except(['_token']);

        $this->repository->create($create);

        return redirect()->route('admin.categories.index')->with('success', __('VarenykyECom::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $parents = Category::all();
        
        return view('VarenykyECom::ecom.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $update = array_filter($request->except(['_token', '_method']));

        $this->repository->update($category->id, $update);

        return redirect()->route('admin.categories.edit', $category->id)->with('success', __('VarenykyECom::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', __('VarenykyECom::labels.deleted'));
    }
}
