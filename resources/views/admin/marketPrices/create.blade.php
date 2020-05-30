@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.market_prices.title_singular') }}
                </div>
            
                <div class="card-body">
                    <form action="{{ route('admin.market-prices.store', app()->getLocale()) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="market_id">{{ trans('cruds.markets.title_singular') }}</label>
                            <select class="form-control {{ $errors->has('market_id') ? 'is-invalid' : '' }}" name="market_id" id="market_id" required>
                                @foreach($markets as $key => $name)
                                    <option value="{{ $key }}" {{ old('market_id') == $key ? 'selected' : ''}}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('market_id'))
                                <span class='text-danger'>{{ $errors->first('market_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.market_prices.fields.market_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="product_id">{{ trans('cruds.products.title_singular') }}</label>
                            <select class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                                @foreach($products as $key => $name)
                                    <option value="{{ $key }}" {{ old('product_id') == $key ? 'selected' : ''}}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                                <span class='text-danger'>{{ $errors->first('product_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.market_prices.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.market_prices.fields.price') }}</label>
                            <input type='number' min="0" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}" id="price" name="price" required>
                            @if($errors->has('price'))
                                <span class='text-danger'>{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.market_prices.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type='submit'>
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
