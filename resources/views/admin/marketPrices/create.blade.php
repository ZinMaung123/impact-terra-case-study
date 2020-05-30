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
                            <label for="market">{{ trans('cruds.markets.title_singular') }}</label>
                            <select class="form-control {{ $errors->has('market') ? 'is-invalid' : '' }}" name="market" id="market" required>
                                @foreach($markets as $key => $name)
                                    <option value="{{ $key }}" {{ old('market') == $key ? 'selected' : ''}}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('market'))
                                <span class='text-danger'>{{ $errors->first('market') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.market_prices.fields.market_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="product">{{ trans('cruds.products.title_singular') }}</label>
                            <select class="form-control {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product" id="product" required>
                                @foreach($products as $key => $name)
                                    <option value="{{ $key }}" {{ old('product') == $key ? 'selected' : ''}}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <span class='text-danger'>{{ $errors->first('product') }}</span>
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
