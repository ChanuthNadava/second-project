<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curd operation</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">

<div class="card text-center">
<div class="navigation">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.create')}}">product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">about</a>
      </li>
    </ul>
  </div>
</div>
  
</div>
        @yield('content')
    </div>
</body>
</html>