@extends('app')

@section('content')
    <div class="content">
    <div class="container">
        <div class="login-page">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <li class="home">
                        <a href="{{url('/')}}" title="Go to Home Page">Home</a>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                        Login
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="{{url('/')}}">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="account_grid">
                <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
                    <h2>NEW CUSTOMERS</h2>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a class="acount-btn" href="{{action('Auth\AuthController@getRegister')}}">Create an Account</a>
                </div>
                <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
                    <h3>REGISTERED CUSTOMERS</h3>
                    <p>If you have an account with us, please log in.</p>
                    @if (session('status'))
                        <div class="alert-message error">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-content">
                                    @include('errors.list')
                                </div>
                            </div>
                        </div>
                    @endif
                    <form method="POST" id="loginForm" action="{{action('Auth\AuthController@postLogin')}}">
                        {!! csrf_field() !!}
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="text" name="email" value="{{ old('email') }}">
                        </div>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="password" id="password">
                        </div>

                        <a class="acount-btn" type="submit" href="javascript:{}" onclick="document.getElementById('loginForm').submit();">Login</a>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('head')
    <title>Login - Businessway</title>
@endsection