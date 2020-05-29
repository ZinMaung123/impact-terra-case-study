@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('success')
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('cruds.products.title') }} {{ trans('global.list') }}
                </div>
                <div class="row mt-2 ml-2 col">
                    <a class="btn btn-success" href="{{ route("admin.products.create", app()->getLocale()) }}">
                        {{ trans('global.add') }} {{ trans('cruds.products.title_singular') }}
                    </a>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive scrollbar">
                        <table class="en-list table table-borderless table-striped scrollbar">
                            <thead>
                                <tr>
                                    <th>
                                        {{-- {{ trans('cruds.role.fields.id') }} --}}
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>                                            
                                            {{-- <a class="btn btn-sm btn-create d-block" href="{{ route('admin.markets.show', $market->id) }}">
                                                {{ trans('global.view') }}
                                            </a>                                         --}}
                                            {{-- <a class="btn btn-sm btn-info d-block mt-1" href="{{ route('admin.markets.edit', ['market' => $market->id, 'locale' => app()->getLocale()]) }}">
                                                {{ trans('global.edit') }}
                                            </a> --}}
                                            <form action="{{ route('admin.products.destroy', ['locale' => app()->getLocale(), 'product' => $product]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-sm btn-create text-danger d-block mt-1" value="{{ trans('global.delete') }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
