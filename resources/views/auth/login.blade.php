@extends('layout.html')
@section('title', 'Connexion')
@section('content')
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Connexion</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" role="form" method="POST" action="{{ url('/login') }}">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">
                                Email
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="lg_username"
                                   name="email"
                                   placeholder="Email"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">
                                Mot de passe
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="lg_password"
                                   name="password"
                                   placeholder="Mot de passe">
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
@endsection