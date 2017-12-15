@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="col-md-4">
                    @foreach($match as $m)
                        <h1>Winners : <img src="{{ $m->flag }}" class="img-responsive" alt="Blason" style="height: 100px;"> {{$m->winner}}</h1>
                    @endforeach
                </div>
                <div class="col-md-4">
                    @foreach($match as $m)
                        <h2>Match's stats:</h2>
                        <p>Faults number: {{$m->faults_nb}}</p>
                        <p>Goals number: {{$m->goals_nb}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>House</th>
                        <th>Name</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playersTeam1 as $players1)
                    <tr>
                        <td><img src="{{$players1->flag}}" class="img-responsive" alt="Blason" style="height: 60px;"></td>
                        <td>{{$players1->name}}</td>
                        <td>{{$players1->position}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <h1>VS</h1>
        </div>
        <div class="col-md-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>House</th>
                        <th>Name</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playersTeam2 as $players2)
                    <tr>
                        <td><img src="{{$players2->flag}}" class="img-responsive" alt="Blason" style="height: 60px;"></td>
                        <td>{{$players2->name}}</td>
                        <td>{{$players2->position}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
    <p>Watch the match here:</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/1A6z7R-aaDw" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</div>
@endsection