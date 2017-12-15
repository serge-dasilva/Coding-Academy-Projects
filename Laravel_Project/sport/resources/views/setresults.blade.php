@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Auth::check() && Auth::User()->admin == 1)
            @foreach($matchTeam as $mt)
                <p>{{ $mt->match_date }}<p>
                <p>{{ $mt->team1 }} VS {{ $mt->team2 }}<p>
            @endforeach
            <form method="post">
                {{ csrf_field() }}
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="faults_nb" class="form-control input-lg" placeholder="Faults number">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="goals_nb" class="form-control input-lg" placeholder="Goals number" >
                    </div>
                </div>
            </div>
              <div class="form-group">
                <label for="winner">Winner</label>
                <select class="form-control" name="winner">
                    @foreach ($matchTeam as $mt)
                        <option>{{ $mt->team1 }}</option>
                        <option>{{ $mt->team2 }}</option>
                    @endforeach
                </select>
              </div>     
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-6 col-md-6"><input type="submit" name="setresults" value="Set Results" class="btn btn-primary btn-block btn-lg"></div>
            </div>
            </form>
            @else
            <p>Vous n'êtes pas admin, merci de retourner à l'accueil <a href="{{ route('home') }}">ici</a></p>
            @endif
        </div>
    </div>
</div>
@endsection