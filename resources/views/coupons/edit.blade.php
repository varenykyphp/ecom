@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.coupons.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.coupons.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.coupons.update', $coupon))
@section('back-btn', route('admin.coupons.index'))

@section('content')
    <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST" id="nopulpForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="amount" class="form-label">{{ __('VarenykyECom::labels.code') }}</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" readonly>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">{{ __('VarenykyECom::labels.amount') }}</label>
            <input type="text" required class="form-control" id="amount" name="amount" value="{{ $coupon->amount }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">{{ __('VarenykyECom::labels.type') }}</label>
            <select class="form-select" name="type" id="type">
                @if ($coupon->type == 'sum')
                    <option selected value="{{ $coupon->type }}">{{ $coupon->type }}</option>
                    <option value="percentage">percentage</option>
                @else
                    <option selected value="{{ $coupon->type }}">{{ $coupon->type }}</option>
                    <option value="sum">sum</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('VarenykyECom::labels.description') }}</label>
            <input type="text" required class="form-control" id="description" name="description"
                value="{{ $coupon->description }}">
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">{{ __('VarenykyECom::labels.expires_at') }}</label>
            <input type="date" required class="form-control" id="expires_at" name="expires_at"
                value="{{ $coupon->expires_at }}">
        </div>
        <div class="mb-3">
            <label for="usage_limit" class="form-label">{{ __('VarenykyECom::labels.usage_limit') }}</label>
            <input type="number" required class="form-control" id="usage_limit" name="usage_limit"
                value="{{ $coupon->usage_limit }}">
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">{{ __('VarenykyECom::labels.active') }}</label>
            <select class="form-select" name="active" id="active">
                @if ($coupon->active == '1')
                    <option selected value="{{ $coupon->active }}">yes</option>
                    <option value="0">no</option>
                @else
                    <option selected value="{{ $coupon->active }}">no</option>
                    <option value="1">yes</option>
                @endif
            </select>
        </div>
    </form>
@stop

@section('js')
@stop
