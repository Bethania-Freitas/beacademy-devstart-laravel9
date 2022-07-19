@extends('template.users')
@section('title', 'admin')
@section('body')
<div class="justify-content-center m-5">
    <div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/dash.jpg') }}" class="card-img-top" alt="Dash">
    <div class="card-body">
        <h5 class="card-title">Bem vindo ao Dashboard</h5>
        <p class="card-text">#pay.livre #be.academy #laravel</p>
    </div>
    </div>
</div>
@endsection