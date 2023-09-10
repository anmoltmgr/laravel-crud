<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>crud</title>
</head>
<body>
    <div style="border: 3px solid black"></div>
    <h1> Register </h1>
    <form action="/post-register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        @error('name')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
        <input name="email" type="text" placeholder="email">
        @error('email')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
        <input name="password" type="password" placeholder="password">
        @error('password')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
        <button>Register</button>
    </form>
</body>
</html>