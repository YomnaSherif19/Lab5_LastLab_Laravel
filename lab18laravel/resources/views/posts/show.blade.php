@extends('layouts.app')
@section('content')
<img src="{{Storage::disk('images')->url($post->image)}}">
<p>post title</p>
{{$post->title}}
<p>post body</p>
{{$post->body}}
<p>username</p>
@foreach ($post->user as $user)
{{$user['name']}}
@endforeach 
@endsection