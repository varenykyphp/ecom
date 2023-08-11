@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.coupons.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.coupons.create.title') }}</strong>
@stop

@section('save-btn', route('admin.coupons.store'))
@section('back-btn', route('admin.coupons.index'))

@section('content')
    <?php
    $code = Str::uuid();
    ?>
    <form action="{{ route('admin.coupons.store') }}" method="POST" id="nopulpForm">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">{{ __('VarenykyECom::labels.code') }}</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $code }}" readonly>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">{{ __('VarenykyECom::labels.amount') }}</label>
            <input type="text" required class="form-control" id="amount" name="amount"
                placeholder="{{ __('VarenykyECom::labels.amount') }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">{{ __('VarenykyECom::labels.type') }}</label>
            <select class="form-select" name="type" id="">
                <option value="">{{ __('VarenykyECom::labels.choice') }}</option>
                <option value="percentage">percentage</option>
                <option value="sum">sum</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('VarenykyECom::labels.description') }}</label>
            <input type="text" required class="form-control" id="description" name="description"
                placeholder="{{ __('VarenykyECom::labels.description') }}">
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">{{ __('VarenykyECom::labels.expires_at') }}</label>
            <input type="date" required class="form-control" id="expires_at" name="expires_at"
                placeholder="{{ __('VarenykyECom::labels.expires_at') }}">
        </div>
        <div class="mb-3">
            <label for="usage_limit" class="form-label">{{ __('VarenykyECom::labels.usage_limit') }}</label>
            <input type="number" required class="form-control" id="usage_limit" name="usage_limit"
                placeholder="{{ __('VarenykyECom::labels.usage_limit') }}">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="active" name="active" value="1" hidden>
        </div>
    </form>
@stop

@section('js')
@stop
