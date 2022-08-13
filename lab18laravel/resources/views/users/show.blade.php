@extends('layouts.app')
@section('content')

{{$user['id']}}
<p>name</p>
{{$user->name}}
<p>email</p>
{{$user->email}}
<p>title</p>
@foreach ($user->posts as $post)
<p>{{$post['title']}}</p>
@endforeach
@show
