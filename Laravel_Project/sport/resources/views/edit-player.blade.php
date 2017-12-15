@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading blason">
                    <h2>Edit a player</h2>
                @foreach($player as $key)

                {!! Form::open(['url' => '#']) !!}
                {!! Form::label('name', 'Name : ') !!}
                {!! Form::text('name', $key->name) !!} 
                {!! Form::label('position', 'Position : ') !!}
                {!! Form::select('position', ['Catcher' => 'Catcher', 'Chaser' => 'Chaser', 'Drummer' => 'Drummer', 'Goalkeeper' => 'Goalkeeper'], $key->position) !!}
                {!! Form::label('team_id', 'Team : ') !!}
                {!! Form::select('team_id', ['1' => 'Gryffindor', '2' => 'Slytherin', '3' => 'Ravenclaw', '4' => 'Hufflepuff'], $key->team_id ) !!}
                {!! Form::submit('Edit player', ["class" => "btn btn-primary btn-cons btn-right"]) !!}
                {!! Form::close() !!}

                 @endforeach               
				</div>
			</div>
		</div>
	</div>
</div>
@endsection