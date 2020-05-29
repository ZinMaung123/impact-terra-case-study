@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('success')
            <div class="card">
                <div class="card-header">Your API Tokens</div>

                <div class="card-body">
                    @if($user->api_token)
                        Your api token for current session is - <br>
                        <p class="text-danger">{{ $user->api_token }}</p>
                    @else
                        No token is generated.
                    @endif
                    <form action="{{ route('admin.users.api-tokens.generate', app()->getLocale()) }}" method="POST" onsubmit="return confirm({{trans('global.areYouSure')}});">
                        @csrf
                        <button type="submit" class="btn btn-success">{{trans("global.generateToken")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
