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
    <div class="container-sm col-md-8"><br>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class=" container navbar-brand" href="{{ route('users.index') }}">Usuários</a>
            </div>
        </nav><br>
        @yield('body')
    </div>
</body>
</html>