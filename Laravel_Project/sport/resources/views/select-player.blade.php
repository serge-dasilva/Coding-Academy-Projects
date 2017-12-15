@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    @foreach ($datas as $key)
                    <h3>{{$key->name}}</h3>
                    <img src="{{$key->team->flag}}">
                    @endforeach
                </div>
               

                <div class="panel-body">
                     <table class="table table-list-search">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Team</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key)
                                <tr>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->position }}</td>
                                    <td>{{ $key->team->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th>Attack</th>
                                <th>Defense</th>
                                <th>Speed</th>
                                <th>Broom</th>
                                <th>Control</th>
                                <th>Agressivity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stats as $key)
                                <tr>
                                    <td>{{ $key->attack }}</td>
                                    <td>{{ $key->defense }}</td>
                                    <td>{{ $key->speed }}</td>
                                    <td>{{ $key->broom }}</td>
                                    <td>{{ $key->control }}</td>
                                    <td>{{ $key->agressivity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection