@extends('layouts.app')
@section('content')

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
    <form method="POST" action="{{route('phones.store',['id'=>$data->id])}}">
        @csrf
        <div class="form-group row">
            <label for="phone"
                   class="col-md-4 col-form-label text-md-right">{{ __('') }}
            </label>
            <div class="col-md-6">
                <label for="title" style="text-align: center;margin-left: 85px">Названия контакта</label>
                <input id="phone" type="phone"  style="max-width: 300px"
                       class="form-control @error('phone') is-invalid @enderror" name="phone"
                       value="{{ old('phone') }}" required autocomplete="phone" placeholder="998__-___-__-__">
                <br>
                @error('phone')
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{'Ошибка при обнавление.Неправино заполнили или такое номер уже есть'}}
                        </div>
                    </div>
                </div>
                @enderror
                <a>
                    <button type="submit" class="btn btn-warning">Сохранить</button>
                </a>
                <a href="{{route('contacts.show',['id'=>$data->id])}}">
                    <button type="button" class="btn btn-danger">Назад</button>
                </a>
            </div>
        </div>
      </div>
    </form>


@endsection
