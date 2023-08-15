<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\Product;
use VarenykyECom\Models\Category;
use VarenykyECom\Models\Brand;
use VarenykyECom\Models\Image;
use VarenykyECom\Repositories\ProductRepository;
use VarenykyECom\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    public function __construct(ProductRepository $repository, ImageRepository $imageRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = $this->repository->getAllPaginated();

        return view('VarenykyECom::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('VarenykyECom::products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token', 'sort_order', 'url']);
        $create['slug'] = Str::slug($create['name']);

        $product = $this->repository->create($create);
        
        $image = $request->only('sort_order');
        $image['product_id'] = $product->id;

        if ($request->hasFile('url')) {
            $file = $request->url;
            $filename = date('Y_m_d_His').'_'.str_replace(' ', '', $file->getClientOriginalName());
            $file->move(public_path('images/products/'), $filename);
            unset($image['url']);
            $image['url'] = '/images/products/'.$filename;
        }

        $this->imageRepository->create($image);

        return redirect()->route('admin.products.index')->with('success', __('VarenykyECom::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {   
        $categories = Category::all();
        $brands = Brand::all();
        $image = Image::where('product_id', $product->id)->first();

        return view('VarenykyECom::products.edit', compact('product', 'categories', 'brands', 'image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {

        $update = array_filter($request->except(['_token', '_method', 'sort_order', 'url']));
        $update['slug'] = Str::slug($request->input('name'));

        $this->repository->update($product->id, $update);
        
        $image = Image::where('product_id', $product->id)->first();

        $image_update = $request->only('sort_order');
        $image_update['product_id'] = $product->id;

        if ($request->hasFile('url')) {
            $file = $request->url;
            $filename = date('Y_m_d_His').'_'.str_replace(' ', '', $file->getClientOriginalName());
            $file->move(public_path('images/products/'), $filename);
            unset($image_update['url']);
            $image_update['url'] = '/images/products/'.$filename;
        }

        $this->imageRepository->update($image->id, $image_update);


        return redirect()->route('admin.products.edit', $product->id)->with('success', __('VarenykyECom::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', __('VarenykyECom::labels.deleted'));
    }
}
