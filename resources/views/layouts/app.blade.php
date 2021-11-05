<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', \Illuminate\Support\Facades\App::getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Laravel') . ' | ' . \Illuminate\Support\Facades\Route::currentRouteName()}}</title>

    <link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css">
    <script href="{{mix('/js/app.js')}}" rel="script" defer>
        $(document).ready(function () {
                Messenger.options = {
                    extraClasses: "messenger-fixed messenger-on-top messenger-on-right",
                    theme: "flat",
                    messageDefaults: {
                        showCloseButton: true
                    }
                }

                @if ($errors->count()  > 0)
                    Messenger().post({
                        message: {{$errors->first()}},
                        type: "error"
                    });
                }
                @endif

                @if(isset($success))
                Messenger().post({
                    message: {{$success}},
                    type: "success"
                });
                @endif
            }
        )
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">ColorLife</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('/')) active @endif" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-primary @if (request()->is('/color')) active @endif" aria-current="page" href="/color">Set Color</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();console.log(this);this.parentElement.submit()">Logout</a>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @if (request()->is(route('login'))) active @endif" href="{{ route('login') }}">{{ __('form.button.login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-primary @if (request()->is(route('register'))) active @endif" href="{{ route('register') }}">{{ __('form.button.register') }}</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
