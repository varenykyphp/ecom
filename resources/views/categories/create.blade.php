@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.categories.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.categories.create.title') }}</strong>
@stop

@section('save-btn', route('admin.categories.store'))
@section('back-btn', route('admin.categories.index'))

@section('content')

        <form action="{{ route('admin.categories.store') }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
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

                        <div class="form-group mb-3">
                            <label for="parent" class="form-label">{{ __('VarenykyBlog::labels.category') }}</label>
                            <select name="parent" class="form-select" aria-label="Default select example">
                                <option value="">{{ __('varenyky::labels.choice') }}</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
