@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $post)
        <h1>{{$post->title}}</h1>
        <h1>{{$post->description}}</h1>
    @empty
        <p>Nenhum post cadastrado!/p>
    @endforelse

</div>
@endsection
