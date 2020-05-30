@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('success')
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('cruds.market_prices.title') }} {{ trans('global.list') }}
                </div>
                <div class="row mt-2 ml-2 col">
                    <a class="btn btn-success" href="{{ route("admin.market-prices.create", app()->getLocale()) }}">
                        {{ trans('global.add') }} {{ trans('cruds.market_prices.title_singular') }}
                    </a>
                </div>
            
                {{-- <div class="card-body">
                    @foreach($markets as $market)
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#market_{{$market->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                {{$market->name}}
                            </a>
                        </p>
                        <div class="collapse" id="market_{{$market->id}}">
                            <div class="card card-body">
                                <div class="table-responsive scrollbar">
                                    <table class="en-list table table-borderless table-striped scrollbar">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Market
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Current price
                                                </th>
                                                <th>
                                                    Last added by
                                                </th>
                                                <th>
                                                    Last added at
                                                </th>
                                                <th>
                                                    &nbsp;
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($market->products as $product)
                                                <tr>
                                                    <td>{{ $market->name }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ number_format($product->pivot->price) }}</td>
                                                    <td>{{ $product->createdBy->name }}</td>
                                                    <td>{{ $product->pivot->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                <div id="accordion" class="card-body">
                    @foreach($markets as $market)
                        <div class="card">
                            <div class="card-header" id="heading_{{$market->id}}">
                            <h4 class="mb-0">
                                <button style="font-size: 18px;" class="btn btn-link {{ $loop->first ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#market_{{$market->id}}" aria-expanded="{{ $loop->first }}" aria-controls="collapseOne">
                                    {{ $market->name }}
                                </button>
                            </h4>
                            </div>
                        
                            <div id="market_{{$market->id}}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading_{{$market->id}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive scrollbar">
                                    <table class="en-list table table-borderless table-striped scrollbar">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Market
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Current price
                                                </th>
                                                <th>
                                                    Last added by
                                                </th>
                                                <th>
                                                    Last added at
                                                </th>
                                                <th>
                                                    &nbsp;
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($market->products as $product)
                                                <tr>
                                                    <td>{{ $market->name }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ number_format($product->pivot->price) }}</td>
                                                    <td>{{ $product->createdBy->name }}</td>
                                                    <td>{{ $product->pivot->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.market-prices.histories', ['locale' => app()->getLocale(), 'market' => $market, 'product' => $product]) }}">
                                                            {{ trans('global.view') }} {{ trans('global.history') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
