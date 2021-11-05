@extends('layouts.app')
@section('content')
    <div class="container w-50 pt-5 mt-5">
        <div class="border border-secondary rounded p-5">
            <div class="text-center mb-6">
                <img src="{{asset('assets/img/logo.jpg')}}" alt="logo.jpg"/>
            </div>
            <form method="post">
                @csrf
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-primary" role="alert">:message</div>')) !!}
                @endif
                <div class="form-outline mb-3">
                    <label class="form-label" for="username">{{ __('form.username.name') }}</label>
                    <input type="text" name="username" id="username"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.username.placeholder')}}" value="{{ old('username') }}" pattern="[a-zA-Z0-9]{4,}" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="email">{{ __('form.email.name') }}</label>
                    <input type="email" name="email" id="email"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.email.placeholder')}}" value="{{ old('email') }}" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="password">{{__('form.password.name')}}</label>
                    <input type="password" id="password" name="password"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.password.placeholder')}}" value="{{ old('password') }}" minlength="8" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="repeatpassword">{{__('form.password.repeat')}}</label>
                    <input type="password" id="repeatpassword" name="repeatpassword"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.password.repeat_placeholder')}}" value="{{ old('repeatpassword') }}"  minlength="8" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="color">{{__('form.color.name')}}</label>
                    <input type="color" id="color" name="color" value="{{ old('color', '000000') }}" class="form-control form-control-lg bg-transparent border-secondary" data-jscolor="{preset:'large dark', position:'right'}" required>
                </div>

                <div class="text-center text-lg-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">{{__('form.button.register')}}</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">{{__('form.sentence.already_login')}} <a
                            href="{{route('login')}}">{{__('form.button.login')}}</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
