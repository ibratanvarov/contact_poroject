@extends('layouts.app')
@section('content')
   <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="{{route('contacts.index')}}">Контакты</a>
        <form class="form-inline" method="POST" action="{{route('contacts.index_search')}}" >
            @csrf
            <input id="search" type="search"
                   class="form-control " name="search"
                   value="{{ old('search') }}" required autocomplete="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <h1 style="text-align: center; color: limegreen" >Контакты</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="color: #0E0EFF">ID</th>
                                <th style="color: #0E0EFF; text-align: center">Name</th>
                                <th style="color: #0E0EFF; text-align: center;">Изменения</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td style="width: 425px; text-align: center"><a href="{{route('contacts.show',$item->id)}}"> {{$item->name}}</a></td>
                                    <td style="color: #ff0000">
                                        <form method="POST" action="{{ route('contacts.destroy',$item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('contacts.index')}}"><button type="submit" class="btn btn-danger">Удалить</button></a>
                                            <a href="{{route('contacts.edit',$item->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="card-body">
                        <a href="{{route('contacts.create')}}"> <button type="button" class="btn btn-warning">Cоздать контакт</button></a>
                    </div>

                </div>
            </div>

        </div>
        @if($number == 0)
            <br>
            <div class="row justify-content-center">
                {{$items->links()}}
            </div>
        @endif


    </div>
@endsection
