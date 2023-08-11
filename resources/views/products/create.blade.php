@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.products.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.products.create.title') }}</strong>
@stop

@section('save-btn', route('admin.products.store'))
@section('back-btn', route('admin.products.index'))

@section('content')

        <form action="{{ route('admin.products.store') }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="name"
                                class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyECom::labels.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('VarenykyECom::labels.name') }}..."
                                name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ old('name') }}">
                        </div>
        
                        <div class="form-group mb-3">
                            <label for="brand_id"
                                class="@if ($errors->has('brand_id')) text-danger @endif">{{ __('VarenykyECom::labels.brand') }}</label>
                            <select id="brand_id" name="brand_id"
                                class="form-control @if ($errors->has('brand_id')) is-invalid @endif">
                                <option value="">{{ __('varenyky::labels.choice') }}</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id"
                                class="@if ($errors->has('category_id')) text-danger @endif">{{ __('VarenykyECom::labels.category') }}</label>
                            <select id="category_id" name="category_id"
                                class="form-control @if ($errors->has('category_id')) is-invalid @endif">
                                <option value="">{{ __('varenyky::labels.choice') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="short_description"
                                class="@if ($errors->has('short_description')) text-danger @endif">{{ __('VarenykyECom::labels.short_description') }}</label>
                            <input id="short_description" type="text" placeholder="{{ __('VarenykyECom::labels.short_description') }}..."
                                name="short_description" class="form-control @if ($errors->has('short_description')) is-invalid @endif"
                                value="{{ old('short_description') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="description"
                                class="@if ($errors->has('description')) text-danger @endif">{{ __('VarenykyECom::labels.description') }}</label>
                            <textarea id="description" placeholder="{{ __('VarenykyECom::labels.description') }}..."
                                name="description" class="form-control @if ($errors->has('description')) is-invalid @endif"
                                rows="4">{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="price"
                                class="@if ($errors->has('price')) text-danger @endif">{{ __('VarenykyECom::labels.price') }}</label>
                            <input id="price" type="number" step="0.01" placeholder="{{ __('VarenykyECom::labels.price') }}..."
                                name="price" class="form-control @if ($errors->has('price')) is-invalid @endif"
                                value="{{ old('price') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="sale_price"
                                class="@if ($errors->has('sale_price')) text-danger @endif">{{ __('VarenykyECom::labels.sale_price') }}</label>
                            <input id="sale_price" type="number" step="0.01" placeholder="{{ __('VarenykyECom::labels.sale_price') }}..."
                                name="sale_price" class="form-control @if ($errors->has('sale_price')) is-invalid @endif"
                                value="{{ old('sale_price') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="sku"
                                class="@if ($errors->has('sku')) text-danger @endif">{{ __('VarenykyECom::labels.sku') }}</label>
                            <input id="sku" type="text" placeholder="{{ __('VarenykyECom::labels.sku') }}..."
                                name="sku" class="form-control @if ($errors->has('sku')) is-invalid @endif"
                                value="{{ old('sku') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="ean"
                                class="@if ($errors->has('ean')) text-danger @endif">{{ __('VarenykyECom::labels.ean') }}</label>
                            <input id="ean" type="text" placeholder="{{ __('VarenykyECom::labels.ean') }}..."
                                name="ean" class="form-control @if ($errors->has('ean')) is-invalid @endif"
                                value="{{ old('ean') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="length"
                                class="@if ($errors->has('length')) text-danger @endif">{{ __('VarenykyECom::labels.length')." ". __('VarenykyECom::labels.in_mm') }}</label>
                            <input id="length" type="number" placeholder="{{ __('VarenykyECom::labels.length') }}..."
                                name="length" class="form-control @if ($errors->has('length')) is-invalid @endif"
                                value="{{ old('length') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="width"
                                class="@if ($errors->has('width')) text-danger @endif">{{ __('VarenykyECom::labels.width')." ". __('VarenykyECom::labels.in_mm') }}</label>
                            <input id="width" type="number" placeholder="{{ __('VarenykyECom::labels.width') }}..."
                                name="width" class="form-control @if ($errors->has('width')) is-invalid @endif"
                                value="{{ old('width') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="height"
                                class="@if ($errors->has('height')) text-danger @endif">{{ __('VarenykyECom::labels.height')." ". __('VarenykyECom::labels.in_mm') }}</label>
                            <input id="height" type="number" placeholder="{{ __('VarenykyECom::labels.height') }}..."
                                name="height" class="form-control @if ($errors->has('height')) is-invalid @endif"
                                value="{{ old('height') }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="weight"
                                class="@if ($errors->has('weight')) text-danger @endif">{{ __('VarenykyECom::labels.weight')." ". __('VarenykyECom::labels.in_grams') }}</label>
                            <input id="weight" type="number" placeholder="{{ __('VarenykyECom::labels.weight') }}..."
                                name="weight" class="form-control @if ($errors->has('weight')) is-invalid @endif"
                                value="{{ old('weight') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="url"
                                class="@if ($errors->has('url')) text-danger @endif">{{  __('VarenykyECom::labels.image')." ". __('VarenykyECom::labels.url') }}</label>
                            <input id="url" type="file" placeholder="{{ __('VarenykyECom::labels.url') }}..."
                                name="url" class="form-control @if ($errors->has('url')) is-invalid @endif"
                                value="{{ old('url') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="sort_order"
                                class="@if ($errors->has('sort_order')) text-danger @endif">{{  __('VarenykyECom::labels.image')." ". __('VarenykyECom::labels.sort_order') }}</label>
                            <input id="sort_order" type="number" placeholder="{{ __('VarenykyECom::labels.sort_order') }}..."
                                name="sort_order" class="form-control @if ($errors->has('sort_order')) is-invalid @endif"
                                value="{{ old('sort_order') }}">
                        </div>

                        
                    </div>
                </div>
            </div>
        </form>
@endsection