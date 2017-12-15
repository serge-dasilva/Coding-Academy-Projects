@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Team overview</div>

                <div class="panel-body">
                    <img src="{{ $team->flag }}" class="img-responsive" alt="Blason" style="margin: auto;">
                <div class="Team-header">
                    <h1>{{ $team->name }}</h1>
                </div>

                <div class="team-desc">
                    <table class="table table-list-search">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Number of players</th>
                                <th>Ranking</th>
                                <th>Matches won</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $team->country }}</td>
                                <td>{{ $team->players_nb }}</td>
                                <td>{{ $team->ranking }}</td>
                                <td>{{ $team->matchs_won }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <table class="table table-list-search">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->position }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection