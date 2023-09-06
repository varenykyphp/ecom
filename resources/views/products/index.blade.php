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
            <tr class="table-dark">
                <th>{{ __('VarenykyECom::labels.name') }}</th>
                <th>{{ __('VarenykyECom::labels.category') }}</th>
                <th width="350"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
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
    {!! $products->links() !!}
</div>
@endsection