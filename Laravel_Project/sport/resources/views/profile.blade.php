@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>Bonjour {{Auth::User()->name}}!</p>
            <p>Vous pouvez changer les informations de votre compte ici :)</p>
            <form method="POST" action="/home">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" value="{{Auth::User()->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control form-control-lg" value="{{Auth::User()->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control form-control-lg">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>
@endsection