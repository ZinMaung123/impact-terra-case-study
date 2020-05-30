@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('cruds.market_prices.title') }} {{ trans('global.history') }}
                </div>
            
                <div class="card-body">
                    <div>
                        <h5>{{ trans('cruds.markets.title_singular') }} - {{ $market->name }}</h5>
                        <h5>{{ trans('cruds.products.title_singular') }} - {{ $product->name }}</h5>
                    </div>
                    <div class="table-responsive scrollbar">
                        <table class="en-list table table-borderless table-striped scrollbar">
                            <thead>
                                <tr>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Added By
                                    </th>
                                    <th>
                                        Added At
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marketHistories as $history)
                                    <tr>
                                        <td>{{ $history->price }}</td>
                                        <td>{{ $history->createdBy->name ?? '-' }}</td>
                                        <td>{{ $history->created_at->diffForHumans() }}</td>
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
