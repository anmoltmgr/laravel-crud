<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD APP</title>
</head>
<body>
    @auth
    <h1>I am home</h1>

    <div style = "border: 3px solid black">
    <h2>Create a post</h2>
    <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title"><br>
        <br>
        <textarea name="body" cols="30" rows="10" placeholder="content"></textarea><br>
        <br>
        <button>Save</button>
    </form>
    </div>

    <div style = "border: 3px solid black">
        <h2>All posts</h2>
        @foreach($posts as $post)
        <div style="background-color: rgb(88, 88, 88); padding: 20px; margin:10px;">
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
        </div>

        <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button> Delete </button>
        </form>
        @endforeach
    </div>

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
    <button  type = button onclick="window.location='{{ route("register") }}'">
        Register
    </button>
@endauth
</body>
</html>