<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar with Dropdown</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">NavBar</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{route('users.index')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('posts.index')}}" class="nav-item nav-link">Posts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Users</a>
                        <div class="dropdown-menu">
                            <a href="{{route('users.index')}}" class="dropdown-item">List</a>
                            <a href="{{route('users.create')}}" class="dropdown-item">New Users</a>
                           
                        </div>
                    </div>
                </div>
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <button type="button" class="btn btn-secondary"><i class="bi-search"></i></button>
                    </div>
                </form>
                <div class="navbar-nav">
                    <a href="{{route('users.create')}}" class="nav-item nav-link">Create User</a>
                </div>
            </div>
        </div>
    </nav>
</div>
</body>
</html>


<!-- 
<div style="dispaly:flex;">
        <h2>Laravel<h2>
            <a href="{{route('users.index')}}">Home</a>
            <select name="Users" id="Users">
                <option value="List" class="myoption"><a href="{{route('users.index')}}">List</a></option>
                <option value="New User"><a href="{{route('users.create')}}">New User</a></option>
</select>
</div> -->


