<?php

namespace VarenykyECom\Support;


use Varenyky\Support\SearchEngineFactory;
use VarenykyECom\Models\Category;
use VarenykyECom\Models\Brand;
use VarenykyECom\Models\Product;

class EComSearchEngineFactory extends SearchEngineFactory
{

    public function categories()
    {
        $this->title = 'All categories | Ecom';
    }

    public function category(Category $category)
    {
        $this->title = $category->name .' | '.$this->settings['site-name'];
        $this->description = '';
    }

    public function brand(Brand $brand)
    {
        $this->title = $brand->name .' | '.$this->settings['site-name'];
        $this->description = '';
    }

    public function product(Product $product)
    {
        $this->title = $product->name .' | '.$product->category->name .' | '.$this->settings['site-name'];

        $image = '';

        $getImg = $product->images->first();
        if (isset($getImg)) {
            $image = $getImg->url;
        }

        $this->image = $image;
    }

    public function cart()
    {
        $this->title = 'Cart | '.$this->settings['site-name'];
    }

    public function checkout()
    {
        $this->title = 'Checkout | '.$this->settings['site-name'];
    }

}
