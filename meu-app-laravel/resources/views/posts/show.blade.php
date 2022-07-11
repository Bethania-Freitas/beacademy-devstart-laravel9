@extends('template.users')
@section('title', 'Listagem de postagens do {{ $user->name }}')
@section('body')
    <h1>Postagens do {{ $user->name }}</h1>
    @foreach($posts as $post)
        <div class="mb-3">
            <label class="form-label" for="">Identificação nº:<b>{{ $post->id }}</b></label>
                <br>
            <label class="form-label" for="">Status:<b>{{ $post->active? 'Ativo' : 'Inativo' }}</b></label>
                <br>
            <label class="form-label" for="">Título:<b>{{ $post->title }}</b></label>
                <br>
            <label class="form-label" for=""><b>Postagem:</b></label>
            <textarea class="form-control" rows="3">{{ $post->post }}</textarea>
                <br>
        </div>
    @endforeach
@endsection