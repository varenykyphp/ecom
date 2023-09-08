@extends('varenykyAdmin::app')

@section('title', __('VarenykyECom::admin.taxclasses.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyECom::admin.taxclasses.index.title') }}</strong>
@stop

@section('create-btn', route('admin.taxclasses.create'))

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
                @forelse ($taxclasses as $taxclass)
                    <tr>
                        <td>{{ $taxclass->name }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.taxclasses', 'entity' => $taxclass])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {!! $taxclasses->links() !!}
    </div>
@endsection
