<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <h1>I am home</h1>
    <form action="/logout" method="POST">
    @csrf
    <button> get out</button>
    </form>
    @else 
    <h1> Please login to see all the details</h1>
    <form action="/post-login" method="POST">
        @csrf
        <input name="email" type="text" placeholder="email">
        @error('email')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
        <input name="password" type="password" placeholder="password">
        @error('password')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
        <button>Login</button>
    </form>
    @endauth
</body>
</html>