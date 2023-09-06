@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.taxrates.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.taxrates.index.title') }}</strong>
@stop

@section('create-btn', route('admin.taxrates.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyECom::labels.name') }}</th>
                    <th>{{ __('VarenykyECom::labels.rate') }}</th>
                    <th>{{ __('VarenykyECom::labels.activeFrom') }}</th>
                    <th>{{ __('VarenykyECom::labels.activeTo') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($taxrates as $taxrate)
                    <tr>
                        <td>{{ $taxrate->taxClass->name }}</td>
                        <td>{{ $taxrate->rate }}</td>
                        <td>{{ $taxrate->active_from }}</td>
                        <td>{{ $taxrate->active_to }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.taxrates', 'entity' => $taxrate])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {!! $taxrates->links() !!}
    </div>
@endsection
