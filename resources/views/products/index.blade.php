@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.products.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.products.index.title') }}</strong>
@stop

@section('create-btn', route('admin.products.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyECom::labels.name') }}</th>
                    <th>{{ __('VarenykyECom::labels.brand') }}</th>
                    <th>{{ __('VarenykyECom::labels.category') }}</th>
                    <th>{{ __('VarenykyECom::labels.slug') }}</th>
                    <th>{{ __('VarenykyECom::labels.short_description') }}</th>
                    <th>{{ __('VarenykyECom::labels.description') }}</th>
                    <th>{{ __('VarenykyECom::labels.price') }}</th>
                    <th>{{ __('VarenykyECom::labels.sale_price') }}</th>
                    <th>{{ __('VarenykyECom::labels.sku') }}</th>
                    <th>{{ __('VarenykyECom::labels.ean') }}</th>
                    <th>{{ __('VarenykyECom::labels.length') }}</th>
                    <th>{{ __('VarenykyECom::labels.width') }}</th>
                    <th>{{ __('VarenykyECom::labels.height') }}</th>
                    <th>{{ __('VarenykyECom::labels.weight') }}</th>
                    
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ implode(' ', array_slice(explode(' ', $product->description), 0, 3)) }}{{ str_word_count($product->description) > 3 ? ' etc...' : '' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->ean }}</td>
                        <td>{{ $product->length }}</td>
                        <td>{{ $product->width }}</td>
                        <td>{{ $product->height }}</td>
                        <td>{{ $product->weight }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.products', 'entity' => $product])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
