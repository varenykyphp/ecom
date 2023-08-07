@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.brands.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.brands.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.brands.update', $brand))
@section('back-btn', route('admin.brands.index'))

@section('content')

        <form action="{{ route('admin.brands.update', $brand) }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="name"
                                class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyECom::labels.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('VarenykyECom::labels.name') }}..."
                                name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ $brand->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
