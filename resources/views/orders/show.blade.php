@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.orders.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.orders.index.title') }}</strong>
@stop


@section('back-btn', route('admin.orders.index'))
@section('content')
    <div class="card border p-3">
    <div class="row">
        <div class="col-6 mb-3">
            <strong>Order information</strong>
            <table class="table table-striped">
                <tr>
                    <td>{{ __('VarenykyECom::labels.date') }}</td>
                    <td align="right">{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <td>{{ __('VarenykyECom::labels.status') }}</td>
                    <td align="right">{{ ucfirst($order->status) }}</td>
                </tr>
                <tr>
                    <td>{{ __('VarenykyECom::labels.payment') }}</td>
                    <td align="right">Stripe</td>
                </tr>
            </table>
            <strong class="mt-3">Handling</strong>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
            </form>
        </div>
        <div class="col-3 mb-3">
            <strong>Shipping address</strong><br>
            @if($order->delivery->company_name !== null)
                {{ $order->delivery->company_name }}<br>
            @endif
            {{ $order->delivery->name }}<br>
            {{ $order->delivery->street}}<br>
            {{ $order->delivery->postalcode }} {{ $order->delivery->city }}<br>
            {{ $order->delivery->country->name }}<br><br> 
        </div>
        <div class="col-3 mb-3">
             <strong class="mt-3">Billing address</strong><br>
            @if($order->billing->company_name !== null)
                {{ $order->billing->company_name }}<br>
            @endif
            {{ $order->billing->name }}<br>
            {{ $order->billing->street }}<br>
            {{ $order->billing->postalcode }} {{ $order->billing->city }}<br>
            {{ $order->billing->country->name }}<br> 
        </div>
        <div class="col-4">
            <strong>Totals</strong>
            <table class="table table-striped">
                <tr>
                    <td>{{ __('VarenykyECom::labels.subtotal') }}</td>
                    <td align="right">&euro; {{ number_format($order->subtotal, 2, ",", ".") }}</td>
                </tr>
                <tr>
                    <td>{{ __('VarenykyECom::labels.shipping') }}</td>
                    <td align="right">&euro; {{ number_format($order->shipping, 2, ",", ".") }}</td>
                </tr>
                <tr>
                    <td>{{ __('VarenykyECom::labels.tax') }}</td>
                    <td align="right">&euro; {{ number_format($order->tax, 2, ",", ".") }}</td>
                </tr>
                <tr>
                    <td>{{ __('VarenykyECom::labels.total') }}</td>
                    <td align="right">&euro; {{ number_format($order->total, 2, ",", ".") }}</td>
                </tr>
            </table>
        </div>
        <div class="col-8">
            <strong>Rows</strong>
            <table class="table table-striped">
                <thead>
                    <th>{{ __('VarenykyECom::labels.product') }}</th>
                    <th>{{ __('VarenykyECom::labels.quantity') }}</th>
                    <th>{{ __('VarenykyECom::labels.subtotal') }}</th>
                    <th>{{ __('VarenykyECom::labels.total') }}</th>
                </thead>
                <tbody>
                    @foreach ($order->rows as $row)
                        <tr>
                            <td>
                                @if($row->product !== null)
                                    {{ $row->product->name }}<br>
                                @else
                                    Single order<br>
                                @endif
                            </td>
                            <td>{{ $row->quantity }}x</td>
                            <td>&euro; {{ number_format($row->price, 2, ",", ".") }}</td>
                            <td>&euro; {{ number_format($row->total, 2, ",", ".") }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@stop
