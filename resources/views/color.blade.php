@extends('layouts/app')
@section('content')
    <div class="container w-50 pt-5 mt-5">
        <div class="border border-secondary rounded p-5">
            <form method="post">
                @csrf
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-primary" role="alert">:message</div>')) !!}
                @endif
                <div class="form-outline mb-3">
                    <label class="form-label" for="color">{{ __('form.color.name') }}</label>
                    <input type="color" name="color" id="color"
                           class="form-control form-control-lg bg-transparent border-secondary"
                           value="{{ old('color', auth()->user()->color) }}"
                           placeholder="{{__('form.color.placeholder')}}" pattern="#[a-zA-Z0-9]{6}(?:[a-zA-Z0-9]{2})?" required/>
                    <div class="text-center text-lg-center mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg w-100">{{__('form.colorSubmit.name')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
