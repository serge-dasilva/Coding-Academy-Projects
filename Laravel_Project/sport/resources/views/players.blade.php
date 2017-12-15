@extends('layouts.app')
@section('content')
<div class="container">
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
                                    <td><a href="{{ route('select-player', ['id' => $gryff_player->id]) }}"><img src="img/mode-circular-button.png"></a></td>
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
                                    <td><a href="{{ route('select-player', ['id' => $serp_player->id]) }}"><img src="img/mode-circular-button.png"></a></td>
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
                                    <td><a href="{{ route('select-player', ['id' => $serd_player->id]) }}"><img src="img/mode-circular-button.png"></a></td>
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
                                    <td><a href="{{ route('select-player', ['id' => $pouf_player->id]) }}"><img src="img/mode-circular-button.png"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>

    <script src="js/actions.js"></script>
@endsection