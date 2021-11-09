{{-- @extends('layouts.guest')

@section('css')
<style>
.card{
    max-width: 500px;
    margin: 20px auto;
}
.card .card-body{
    padding: 20px 20px;
    width: 100%;
}
.card-body form{
    width: 100%;
}
.card-body form label{
    font-size: 15px;
    letter-spacing: 0.1rem;
    margin-top: 10px;
    margin-bottom: 5px;
}
.card-body form .btn-send{
   text-align: center;
   margin-top: 20px;
}
.card-body form button {
    background-color: #3490dc;
}
</style>
@endsection

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">パスワード再設定</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="btn-send">
                            <button type="submit" class="btn btn-primary">送信</button>                                                        
                       </div>                                  
                </form>
            </div>
        </div>
   
</div> 
@endsection --}}

@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

