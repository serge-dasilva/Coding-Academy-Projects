@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Auth::check() && Auth::User()->admin == 1)
            <form method="post">
                {{ csrf_field() }}
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="meteo" class="form-control input-lg" placeholder="Meteo">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="place" class="form-control input-lg" placeholder="Location" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="match_date" class="form-control input-lg" placeholder="Date" >
            </div> 
             <div class="form-group">
              <label for="team1">Team 1:</label>
              <select class="form-control" name="team1">
                @foreach ($teams as $team)
                    <option>{{ $team->name }}</option>
                @endforeach
              </select>
            </div> 
             <div class="form-group">
              <label for="team2">Team 2:</label>
              <select class="form-control" name="team2">
                @foreach ($teams as $team)
                    <option>{{ $team->name }}</option>
                @endforeach
              </select>
            </div>         
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-6 col-md-6"><input type="submit" name="create" value="Create" class="btn btn-primary btn-block btn-lg"></div>
            </div>
            </form>
            @endif
            <table class="table table-list-search">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Teams</th>
                        <th>Meteo</th>
                        <th>Location</th>
                        <th><th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($match as $m)
                    <tr>
                        <td>{{ $m->match_date }}</td>
                        <td>{{ $m->team1 }} VS {{ $m->team2 }}</td>
                        <td>{{ $m->meteo }}</td>
                        <td>{{ $m->place }}</td>
                        @if(Auth::check() && Auth::User()->admin == 1)
                            <td><a href="{{ route('delmatches', ['id' => $m->id]) }}"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>
                            <td><a href="{{ route('setresults', ['id' => $m->id]) }}"><button type="button" class="btn btn-warning btn-xs">setRes</button></a></td>
                        @elseif (Auth::check() && $m->match_date >= date('Y-m-d'))
                            <td><a href="#"><button type="button" class="btn btn-success btn-xs">Parier</button></a></td>
                        @elseif (Auth::check() && $m->match_date < date('Y-m-d'))
                            <td><a href="{{ route('results', ['id' => $m->id]) }}"><button type="button" class="btn btn-info btn-xs">Résultats</button></a></td>
                        @endif
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
