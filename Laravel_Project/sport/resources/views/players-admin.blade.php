@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default add-player">
                {!! Form::open(['url' => 'players-admin']) !!}
                {!! Form::label('name', 'Name : ', ['class' => 'label-class']) !!}
                {!! Form::text('name') !!} 
                {!! Form::label('position', 'Position : ', ['class' => 'label-class']) !!}
                {!! Form::select('position', ['Catcher' => 'Catcher', 'Chaser' => 'Chaser', 'Drummer' => 'Drummer', 'Goalkeeper' => 'Goalkeeper']) !!}
                {!! Form::label('team_id', 'Team : ', ['class' => 'label-class']) !!}
                {!! Form::select('team_id', ['1' => 'Gryffindor', '2' => 'Slytherin', '3' => 'Ravenclaw', '4' => 'Hufflepuff']) !!}
                {!! Form::submit('Add player', ["class" => "btn btn-primary btn-cons btn-right"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    @foreach ($flag_gryff as $key)
                    <h3>{{$key->name}}</h3>
                   <img class="players_tab" src="{{$key->flag}}">
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
                            @foreach ($gryff as $gryff_player)
                                <tr>
                                    <td>{{ $gryff_player->name }}</td>
                                    <td>{{ $gryff_player->position }}</td>
                                    <td>{{ $gryff_player->team->name }}</td>
                                    <td><a href="{{ route('edit-player', ['id' => $gryff_player->id]) }}"><button type="button" class="btn btn-labeled btn-info">
                <span class="btn-label"></i></span>Edit</button></a></td>
                                    <td><a href="{{ route('destroy-player', ['id' => $gryff_player->id]) }}"><button type="button" class="btn btn-labeled btn-danger">
                <span class="btn-label"></span>Trash</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    @foreach ($flag_serp as $key)
                    <h3>{{$key->name}}</h3>
                   <img class="players_tab" src="{{$key->flag}}">
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
                            @foreach ($serp as $serp_player)
                                <tr>
                                    <td>{{ $serp_player->name }}</td>
                                    <td>{{ $serp_player->position }}</td>
                                    <td>{{ $serp_player->team->name }}</td>
                                    <td><a href="{{ route('edit-player', ['id' => $serp_player->id]) }}"><button type="button" class="btn btn-labeled btn-info">
                <span class="btn-label"></i></span>Edit</button></a></td>
                                    <td><a href="{{ route('destroy-player', ['id' => $serp_player->id]) }}"><button type="button" class="btn btn-labeled btn-danger">
                <span class="btn-label"></span>Trash</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    @foreach ($flag_serd as $key)
                    <h3>{{$key->name}}</h3>
                   <img class="players_tab" src="{{$key->flag}}">
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
                            @foreach ($serd as $serd_player)
                                <tr>
                                    <td>{{ $serd_player->name }}</td>
                                    <td>{{ $serd_player->position }}</td>
                                    <td>{{ $serd_player->team->name }}</td>
                                    <td><a href="{{ route('edit-player', ['id' => $serd_player->id]) }}"><button type="button" class="btn btn-labeled btn-info">
                <span class="btn-label"></i></span>Edit</button></a></td>
                                    <td><a href="{{ route('destroy-player', ['id' => $serd_player->id]) }}"><button type="button" class="btn btn-labeled btn-danger">
                <span class="btn-label"></span>Trash</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    @foreach ($flag_pouf as $key)
                    <h3>{{$key->name}}</h3>
                   <img class="players_tab" src="{{$key->flag}}">
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
                            @foreach ($pouf as $pouf_player)
                                <tr>
                                    <td>{{ $pouf_player->name }}</td>
                                    <td>{{ $pouf_player->position }}</td>
                                    <td>{{ $pouf_player->team->name }}</td>
                                    <td><a href="{{ route('edit-player', ['id' => $pouf_player->id]) }}"><button type="button" class="btn btn-labeled btn-info">
                <span class="btn-label"></i></span>Edit</button></a></td>
                                    <td><a href="{{ route('destroy-player', ['id' => $pouf_player->id]) }}"><button type="button" class="btn btn-labeled btn-danger">
                <span class="btn-label"></span>Trash</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
@endsection
