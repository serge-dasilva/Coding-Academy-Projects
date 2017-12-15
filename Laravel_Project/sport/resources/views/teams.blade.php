@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teams</div>

                <div class="panel-body">
                     <table class="table table-list-search">
                        <thead>
                            <tr>
                                <th>Flag</th>
                                <th>name</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td><a href="{{ route('teamShow', ['id' => $team->id]) }}"><img src="{{ $team->flag }}" class="img-responsive" alt="Blason"></a></td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->country }}</td>
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