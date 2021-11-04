@extends('layouts.app')
@section('content')
    <div class="container w-50 pt-5 mt-5">
        <div class="border border-secondary rounded p-5">
            <div class="text-center mb-6">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="logo.jpg"/>
            </div>
            <form method="post">
                <div class="form-outline mb-3">
                    <label class="form-label" for="username">{{ __('form.username.name') }}</label>
                    <input type="text" name="username" id="username"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.username.placeholder')}}" pattern="[a-zA-Z0-9]" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="password">{{__('form.password.name')}}</label>
                    <input type="password" id="password" name="password"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.password.placeholder')}}" minlength="8" required/>
                </div>

                <div class="text-center text-lg-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">{{__('form.button.login')}}</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">{{__('form.sentence.no_login')}} <a
                            href="{{route('register')}}">{{__('form.button.register')}}</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
