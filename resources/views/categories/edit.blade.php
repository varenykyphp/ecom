@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.categories.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.categories.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.categories.update', $category))
@section('back-btn', route('admin.categories.index'))

@section('content')

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="name"
                                class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyBlog::labels.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('VarenykyBlog::labels.name') }}..."
                                name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ $category->name }}">
                        </div>
                       
                        <div class="form-group mb-3">
                            <label for="parent" class="form-label">{{ __('VarenykyBlog::labels.category') }}</label>
                            <select name="parent" class="form-select" aria-label="Default select example">
                                @foreach ($parents as $parent)
                                    <option {{ $parent->id === $category->parent ? 'selected' : '' }} value="{{ $parent->id }}">
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>  

                    </div>
                </div>
            </div>
        </form>
@endsection
