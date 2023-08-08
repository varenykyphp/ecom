@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.taxrates.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.taxrates.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.taxrates.update', $taxrate))
@section('back-btn', route('admin.taxrates.index'))

@section('content')

        <form action="{{ route('admin.taxrates.update', $taxrate) }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="tax_class_id" class="form-label">{{ __('VarenykyBlog::labels.id') }}</label>
                            <select name="tax_class_id" class="form-select" aria-label="Default select example">
                                <option>{{ __('varenyky::labels.choice') }}</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ $class->id === $taxrate->tax_class_id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="rate"
                                class="@if ($errors->has('rate')) text-danger @endif">{{ __('VarenykyECom::labels.rate') }}</label>
                            <input id="rate" type="text" placeholder="{{ __('VarenykyECom::labels.rate') }}..."
                                name="rate" class="form-control @if ($errors->has('rate')) is-invalid @endif"
                                value="{{ $taxrate->rate }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="active_from"
                                class="@if ($errors->has('active_from')) text-danger @endif">{{ __('VarenykyECom::labels.activeFrom') }}</label>
                            <input id="active_from" type="date" placeholder="{{ __('VarenykyECom::labels.activeFrom') }}..."
                                name="active_from" class="form-control @if ($errors->has('active_from')) is-invalid @endif"
                                value="{{ old('active_from', $taxrate->active_from ?? '') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="active_to"
                                class="@if ($errors->has('active_to')) text-danger @endif">{{ __('VarenykyECom::labels.activeTo') }}</label>
                            <input id="active_to" type="date" placeholder="{{ __('VarenykyECom::labels.activeTo') }}..."
                                name="active_to" class="form-control @if ($errors->has('active_to')) is-invalid @endif"
                                value="{{ old('active_to', $taxrate->active_to ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
