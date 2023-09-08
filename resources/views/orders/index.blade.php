@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.orders.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.orders.index.title') }}</strong>
@stop


@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>#</th>
                    <th>{{ __('VarenykyECom::labels.date') }}</th>
                    <th>{{ __('VarenykyECom::labels.shiptoname') }}</th>
                    <th>{{ __('VarenykyECom::labels.total') }}</th>
                    <th>{{ __('VarenykyECom::labels.status') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->uuid }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->delivery->name }}</td>
                        <td>&dollar; {{ number_format($order->total,2) }}</td>
                        <td>{{ $order->status }}</td>
                        <td align="right">
                            <a href="{{ route("admin.orders.show", $order) }}" class="btn btn-sm btn-secondary me-1">
                                <i class="fa-solid fa-eye me-2"></i> {{ __('VarenykyECom::labels.show') }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('VarenykyECom::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {!! $orders->links() !!}
    </div>
@endsection
