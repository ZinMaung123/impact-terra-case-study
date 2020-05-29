@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card content-card display-card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.products.title_singular') }}
                </div>
            
                <div class="card-body">
                    <form action="{{ route('admin.products.store', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.products.fields.name') }}</label>
                            <input type='text' class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" required>
                            @if($errors->has('name'))
                                <span class='text-danger'>{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.products.fields.name_helper') }}</span>
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
