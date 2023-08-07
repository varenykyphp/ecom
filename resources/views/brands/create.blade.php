@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.brands.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.brands.create.title') }}</strong>
@stop

@section('save-btn', route('admin.brands.store'))
@section('back-btn', route('admin.brands.index'))

@section('content')

        <form action="{{ route('admin.brands.store') }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
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
                    </div>
                </div>
            </div>
        </form>
@endsection
