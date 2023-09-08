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
use Illuminate\Support\Facades\Storage;

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
        
        $sort_order = Image::where('product_id', $product->id)->max('sort_order') ?? 0;
    
        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $file) {
                $filename = date('Y_m_d_His') . '_' . str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('images/products/'), $filename);
    
                $image = new Image([
                    'product_id' => $product->id,
                    'sort_order' => $sort_order + 1,
                    'url' => '/images/products/' . $filename,
                ]);
    
                $image->save();
                $sort_order++;
            }
        }

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
        $images = Image::where('product_id', $product->id)->orderBy('sort_order', 'asc')->get();


        return view('VarenykyECom::products.edit', compact('product', 'categories', 'brands', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {   
        $update = array_filter($request->except(['_token', '_method', 'sort_order', 'url', 'row']));
        $update['slug'] = Str::slug($request->input('name'));

        $this->repository->update($product->id, $update);

        if ($request->hasFile('url')) {
            $sort_order = Image::where('product_id', $product->id)->max('sort_order') ?? 0;

            foreach ($request->file('url') as $file) {
                $filename = date('Y_m_d_His') . '_' . str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('images/products/'), $filename);

                $image = new Image([
                    'product_id' => $product->id,
                    'sort_order' => $sort_order + 1,
                    'url' => '/images/products/' . $filename,
                ]);

                $image->save();
                $sort_order++;
            }
        }

        if ($request->has('row')) {
            foreach ($request->input('row') as $id => $row) {
                $item = Image::findorfail($id);
                $item->sort_order = $row['sort_order'];
                $item->save();
            }
        }
            

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

    public function deleteImage(Image $image)
    {
        Storage::delete($image->url);
        $image->delete();
        
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
