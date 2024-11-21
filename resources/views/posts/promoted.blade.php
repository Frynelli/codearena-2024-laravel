@extends('layouts.app')

@section('content')
@if($promoted->isEmpty())
    <p>No promoted posts</p>
    @else
    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
@foreach ($promoted as $post)
    @include('components.post', ['post' => $post])
@endforeach
</div>
@endif

@endsection