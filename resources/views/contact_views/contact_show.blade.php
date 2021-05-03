@extends('layouts.app')
@section('content')
    <h1 style="text-align: center; color: limegreen" >Названия контакта:{{$contact->name}}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <thead>
                 <tr>
                    <th>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <td style="color: #0E0EFF;text-align: center">Email</td>
                                            <td style="color: #0E0EFF;text-align: center">Изменения</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($items as $item)
                                            <tr>
                                                @if(isset($item->email))
                                                    <td style="width: 425px; text-align: center">{{$item->email}}</td>
                                                    <td style="color: #ff0000">
                                                        <form method="POST" action="{{route('emails.destroy',$item->id)}}" style="width: 180px">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route('contacts.show',$contact->id)}}"><button type="submit" class="btn btn-danger">Удалить</button></a>
                                                            <a href="{{route('emails.edit',$item->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>

                                </div>
                                </div>
                    </th>
                    <th>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td style="color: #0E0EFF; text-align: center">Phone</td>
                                        <td style="color: #0E0EFF;text-align: center">Изменения</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($items as $item)
                                        <tr>
                                            @if(isset($item->phone))

                                                <td style="width: 425px; text-align: center">{{$item->phone}}</td>
                                                <td style="color: #ff0000; text-align: center">
                                                    <form method="POST" action="{{route('phones.destroy',$item->id)}}" style="width: 180px">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('contacts.show',$contact->id)}}"><button type="submit" class="btn btn-danger">Удалить</button></a>
                                                        <a href="{{route('phones.edit',$item->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </th>
                </tr>
            </thead>

                <div class="form-group row mb-0">
                    <div class="card-body">
                        <a href="{{route('emails.create',$contact->id)}}"> <button type="button" class="btn btn-success">Cоздать email</button></a>

                        <a href="{{route('phones.create',['id'=>$contact->id])}}"> <button type="button" class="btn btn-success">Создать телефон номер</button></a>

                        <a href="{{route('contacts.index')}}"><button type="submit" class="btn btn-danger">Назад</button></a>
                    </div>

                </div>
            </div>

        </div>
{{--        @if($items)--}}
{{--            <br>--}}
{{--            <div class="row justify-content-center">--}}
{{--                {{$items->links()}}--}}
{{--            </div>--}}
{{--        @endif--}}


    </div>
@endsection
