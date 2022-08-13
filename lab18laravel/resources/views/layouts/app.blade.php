
@include('includes.navbar')
<html>
    <head>
<title>{{config('app.name')}} - @yield('title')</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    .myoption{
        background-color:blue;
    }
</style>
    </head>
    <body>
    @section('navbar')
         <!-- <div style="dispaly:flex;">
        <h2>Laravel<h2>
            <a href="\users.index">Home</a>
            <select name="Users" id="Users">
                <option value="List"><a href="\users.create">List</a></option>
                <option value="New User"><a href="#">New User</a></option>
</select>
</div> -->
@show
<div class="container">
    @yield('content')
</div>


   </body>
    <html>