@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        @if(session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session('success')}}</li>
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your API Tokens</div>

                <div class="card-body">
                    @if($user->api_token)
                        Your api token for current session is - <br>
                        <p class="text-danger">{{ $user->api_token }}</p>
                    @else
                        No token is generated.
                        <form action="{{ route('admin.users.api-tokens.generate') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Generate Token</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
