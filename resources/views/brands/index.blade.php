@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.brands.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.brands.index.title') }}</strong>
@stop

@section('create-btn', route('admin.brands.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyECom::labels.name') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.brands', 'entity' => $brand])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
