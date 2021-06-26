@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 15pt;">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3>{{ __('You are logged in!') }}</h3>
                    <br>
                    <br>
                    <div class="cart_text">
                        <center><h2><a href="/admin"
                        style="text-decoration: underline; 
                        color: #000000;">Klik Untuk Menuju Halaman Admin</a></h2></center>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
