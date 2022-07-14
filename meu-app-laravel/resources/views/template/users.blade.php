<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container w-75 p-3"><br>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" >
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="/users">Usuários</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="/posts">Posts</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul class ="navbar-nav mr-auto">
                                @if(Auth::user())
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                                    </li>
                                    @if(Auth::user()->is_admin == 1)
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('admin') }}">Dashboard</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-light text-white" >Sair</button>
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white" href="{{ route('register') }}">Cadastrar</a>
                                    </li>
                                @endif
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>                  
        </nav>
        @yield('body')
    </div>
</body>
</html>