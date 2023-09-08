@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.products.edit.title'))

@section('content_header')
<strong>{{ __('VarenykyECom::admin.products.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.products.update', $product))
@section('back-btn', route('admin.products.index'))

@section('content')

<form action="{{ route('admin.products.update', $product) }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card border p-3 mb-3">
                <div class="form-group mb-3">
                    <label for="name" class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyECom::labels.name') }}</label>
                    <input id="name" type="text" placeholder="{{ __('VarenykyECom::labels.name') }}..." name="name" class="form-control @if ($errors->has('name')) is-invalid @endif" value="{{ $product->name }}">
                </div>

                <div class="form-group mb-3">
                    <label for="brand_id" class="@if ($errors->has('brand_id')) text-danger @endif">{{ __('VarenykyECom::labels.brand') }}</label>
                    <select id="brand_id" name="brand_id" class="form-control @if ($errors->has('brand_id')) is-invalid @endif">
                        <option value="">{{ __('varenyky::labels.choice') }}</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="category_id" class="@if ($errors->has('category_id')) text-danger @endif">{{ __('VarenykyECom::labels.category') }}</label>
                    <select id="category_id" name="category_id" class="form-control @if ($errors->has('category_id')) is-invalid @endif">
                        <option value="">{{ __('varenyky::labels.choice') }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="is_active" class="@if ($errors->has('is_active')) text-danger @endif">{{ __('VarenykyECom::labels.is_active') }}</label>
                    <select id="is_active" name="is_active" class="form-control @if ($errors->has('is_active')) is-invalid @endif">
                        <option value="">{{ __('varenyky::labels.choice') }}</option>
                        <option value="1" {{ $product->is_active == 1 ? 'selected' : '' }}>{{ __('VarenykyECom::labels.yes') }}</option>
                        <option value="0" {{ $product->is_active == 0 ? 'selected' : '' }}>{{ __('VarenykyECom::labels.no') }}</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="short_description" class="@if ($errors->has('short_description')) text-danger @endif">{{ __('VarenykyECom::labels.short_description') }}</label>
                    <input id="short_description" type="text" placeholder="{{ __('VarenykyECom::labels.short_description') }}..." name="short_description" class="form-control @if ($errors->has('short_description')) is-invalid @endif" value="{{ $product->short_description }}">
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="@if ($errors->has('description')) text-danger @endif">{{ __('VarenykyECom::labels.description') }}</label>
                    <textarea id="description" placeholder="{{ __('VarenykyECom::labels.description') }}..." name="description" class="form-control @if ($errors->has('description')) is-invalid @endif" rows="4">{{ $product->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="@if ($errors->has('price')) text-danger @endif">{{ __('VarenykyECom::labels.price') }}</label>
                    <input id="price" type="number" step="0.01" placeholder="{{ __('VarenykyECom::labels.price') }}..." name="price" class="form-control @if ($errors->has('price')) is-invalid @endif" value="{{ number_format($product->price, 2) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="sale_price" class="@if ($errors->has('sale_price')) text-danger @endif">{{ __('VarenykyECom::labels.sale_price') }}</label>
                    <input id="sale_price" type="number" step="0.01" placeholder="{{ __('VarenykyECom::labels.sale_price') }}..." name="sale_price" class="form-control @if ($errors->has('sale_price')) is-invalid @endif" value="{{ number_format($product->sale_price, 2) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="stock" class="@if ($errors->has('stock')) text-danger @endif">{{ __('VarenykyECom::labels.stock') }}</label>
                    <input id="stock" type="number" step="0.01" placeholder="{{ __('VarenykyECom::labels.stock') }}..." name="stock" class="form-control @if ($errors->has('stock')) is-invalid @endif" value="{{ $product->stock }}">
                </div>

                <div class="form-group mb-3">
                    <label for="sku" class="@if ($errors->has('sku')) text-danger @endif">{{ __('VarenykyECom::labels.sku') }}</label>
                    <input id="sku" type="text" placeholder="{{ __('VarenykyECom::labels.sku') }}..." name="sku" class="form-control @if ($errors->has('sku')) is-invalid @endif" value="{{ $product->sku }}">
                </div>

                <div class="form-group mb-3">
                    <label for="ean" class="@if ($errors->has('ean')) text-danger @endif">{{ __('VarenykyECom::labels.ean') }}</label>
                    <input id="ean" type="text" placeholder="{{ __('VarenykyECom::labels.ean') }}..." name="ean" class="form-control @if ($errors->has('ean')) is-invalid @endif" value="{{ $product->ean }}">
                </div>

                <div class="form-group mb-3">
                    <label for="length" class="@if ($errors->has('length')) text-danger @endif">{{ __('VarenykyECom::labels.length')." ". __('VarenykyECom::labels.in_mm') }}</label>
                    <input id="length" type="number" placeholder="{{ __('VarenykyECom::labels.length') }}..." name="length" class="form-control @if ($errors->has('length')) is-invalid @endif" value="{{ $product->length }}">
                </div>

                <div class="form-group mb-3">
                    <label for="width" class="@if ($errors->has('width')) text-danger @endif">{{ __('VarenykyECom::labels.width')." ". __('VarenykyECom::labels.in_mm') }}</label>
                    <input id="width" type="number" placeholder="{{ __('VarenykyECom::labels.width') }}..." name="width" class="form-control @if ($errors->has('width')) is-invalid @endif" value="{{ $product->width }}">
                </div>

                <div class="form-group mb-3">
                    <label for="height" class="@if ($errors->has('height')) text-danger @endif">{{ __('VarenykyECom::labels.height')." ". __('VarenykyECom::labels.in_mm') }}</label>
                    <input id="height" type="number" placeholder="{{ __('VarenykyECom::labels.height') }}..." name="height" class="form-control @if ($errors->has('height')) is-invalid @endif" value="{{ $product->height }}">
                </div>

                <div class="form-group mb-3">
                    <label for="weight" class="@if ($errors->has('weight')) text-danger @endif">{{ __('VarenykyECom::labels.weight')." ". __('VarenykyECom::labels.in_grams') }}</label>
                    <input id="weight" type="number" placeholder="{{ __('VarenykyECom::labels.weight') }}..." name="weight" class="form-control @if ($errors->has('weight')) is-invalid @endif" value="{{ $product->weight }}">
                </div>
            </div>

            <div class="card border p-3">
                <div class="form-group mb-3">
                    <label for="url" class="mb-2 @if ($errors->has('url')) text-danger @endif">{{ __('VarenykyECom::labels.product')." ". __('VarenykyECom::labels.images') }}</label>
                    <input id="url" type="file" placeholder="{{ __('VarenykyECom::labels.url') }}..." name="url[]" class="form-control @if ($errors->has('url')) is-invalid @endif" multiple>
                </div>

            </form>

                <div class="card border p-3">
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th>{{ __('VarenykyECom::labels.images') }}</th>
                                <th width="350"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($images as $index => $image)
                            <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                                <td><img src="{{ $image->url }}" alt="image" style="width: 150px;" draggable="false"></td>
                                <td align="right">
                                    <form action="{{ route('admin.product.image.delete', $image) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt me-2"></i>{{ __('varenyky::labels.delete') }}</button>
                                    </form>
                                </td>
                                <input type="hidden" name="row[{{ $image->id }}][sort_order]" class="sort_order" value="{{ $index }}">
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <script>
                        var row;

                        function start(){  
                        row = event.target; 
                        }

                        function dragover(){
                        var e = event;
                        e.preventDefault(); 
                        
                        let children= Array.from(e.target.parentNode.parentNode.children);
                        
                        if(children.indexOf(e.target.parentNode)>children.indexOf(row))
                            e.target.parentNode.after(row);
                        else
                            e.target.parentNode.before(row);

                            updateSortOrder();
                        }

                        
                        function updateSortOrder() {
                            let rows = document.querySelectorAll('.table tbody tr');
                    
                            rows.forEach(function(row, index) {
                                row.querySelector('.sort_order').value = index;
                            });
                        }
                    </script>
                </div>

            </div>
        </div>
    </div>
@endsection