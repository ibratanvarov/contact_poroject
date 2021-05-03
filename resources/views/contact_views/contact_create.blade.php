@extends('layouts.app')
@section('content')
    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{'Такое кантакт уже есть'}}
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
    <form method="POST" action="{{route('contacts.store')}}">
        @csrf
        <div class="form-group row">
            <label for="name"class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-4">
                <input id="name" type="name"
                       class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name">
                <br>
                <button type="submit" class="btn btn-warning">Сохранить</button>
                <a href="{{route('contacts.index')}}">
                    <button type="button" class="btn btn-danger">Назад</button>
                </a>
            </div>
        </div>
    </form>
@endsection
