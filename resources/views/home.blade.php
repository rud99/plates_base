@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @guest
                    <div class="alert alert-warning" role="alert" style="text-align: center;">
                        <h2>Необходимо войти в систему!</h2>
                        <h4>Зарегистрируйтесь или используйте одного из следующих пользователей:</h4>
                        @foreach($users as $user)
                            <br>ЛОГИН: {{ $user->email }}, ПАРОЛЬ: password
                        @endforeach
                    </div>
                    @else
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                        @endguest
            </div>
        </div>
    </div>
@endsection
