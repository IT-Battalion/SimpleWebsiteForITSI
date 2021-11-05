@extends('layouts.app')
@section('content')
    <section class="container-fluid">
        <div class="align-content-center d-flex justify-content-center">
            <form>
                <div class="form-outline mb-3">
                    <label class="form-label" for="username">{{ __('form.username.name') }}</label>
                    <input type="text" name="username" id="username"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.username.placeholder')}}" value="{{auth()->user()->username ?? 'null'}}" disabled/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="email">{{ __('form.email.name') }}</label>
                    <input type="email" name="email" id="email"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.email.placeholder')}}" value="{{auth()->user()->email ?? 'null'}}" disabled/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="date">{{__('form.date.name')}}</label>
                    <input type="text" id="date" name="date"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           placeholder="{{__('form.date.placeholder')}}" value="{{auth()->user()->created_at ?? 'null'}}" disabled/>
                </div>

                <a href="/color" class="text-decoration-none text-light">
                    <div class="form-outline mb-3">
                        <label class="form-label" for="color">{{__('form.color.name')}}</label>
                        <input id="color" name="color" value="{{auth()->user()->color ?? 'null'}}" class="form-control form-control-lg bg-transparent border-secondary" data-jscolor="{preset:'large dark', position:'right'}" disabled>
                        <span class="link-primary">Farbe bearbeiten</span>
                        <div class="m-auto mt-4" style="background-color: {{ auth()->user()->color }};width:50px;height:50px"></div>
                    </div>
                </a>
            </form>
        </div>
    </section>
@endsection
