@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.markets.title_singular') }}
                </div>
            
                <div class="card-body">
                    <form action="{{ route('admin.markets.store', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.markets.fields.name') }}</label>
                            <input type='text' class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ old('name') }}" required>
                            @if($errors->has('name'))
                                <span class='text-danger'>{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.markets.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.markets.fields.description') }}</label>
                            <textarea type='text' class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class='text-danger'>{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.markets.fields.description_helper') }}</span>
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
