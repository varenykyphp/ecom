@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.coupons.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.coupons.index.title') }}</strong>
@stop

@section('create-btn', route('admin.coupons.create'))

@section('content')
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <th>{{ __('VarenykyECom::labels.user') }}</th>
                <th>{{ __('VarenykyECom::labels.description') }}</th>
                <th>{{ __('VarenykyECom::labels.type') }}</th>
                <th width="350"></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @forelse ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->user->name }}</td>
                    <td>{{ $coupon->description }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td align="right">@include('varenykyAdmin::actions', ['route' => 'admin.coupons', 'entity' => $coupon])</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">{{ __('VarenykyECom::labels.empty') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{--  {!! $coupons->links() !!} --}}
@stop

@section('js')
@stop
