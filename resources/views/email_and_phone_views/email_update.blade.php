@extends('layouts.app')
@section('content')
    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{'Такое email уже есть'}}
                </div>
            </div>
        </div>
    @endif
    @if(session('success'))
        <div class="row-justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{session()->get('success')}}
                </div>
            </div>
        </div>
    @endif
    <div style="text-align: center;">
        <h2 style="text-align: center; color: limegreen"> Названия контакта: {{$email->email}}</h2>
    </div>
    @if(session('success'))
        <div class="row-justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{session()->get('success')}}
                </div>
            </div>
        </div>
    @endif
    <form method="POST" action="{{route('emails.update',['id'=>$email->id])}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group row">
            <label for="email"
                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            <div class="col-md-4">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">
                <br>
                <a>
                    <button type="submit" class="btn btn-warning">Сохранить</button>
                </a>
                <a href="{{route('contacts.show',['id'=>$email->contact_id])}}">
                    <button type="button" class="btn btn-danger">Назад</button>
                </a>
            </div>
        </div>

    </form>

@endsection
