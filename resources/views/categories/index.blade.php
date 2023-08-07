@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.categories.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.categories.index.title') }}</strong>
@stop

@section('create-btn', route('admin.categories.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyECom::labels.name') }}</th>
                    <th>{{ __('VarenykyECom::labels.parent') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parentName($category->parent) }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.categories', 'entity' => $category])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('VarenykyECom::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
