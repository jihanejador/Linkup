<!DOCTYPE html>
<html>
<head>
    <title>LinkUp Feed</title>
</head>
<body>

    <h1>LinkUp Feed</h1>

    @foreach($posts as $post)
        <div style="border:1px solid #ccc; margin:10px; padding:10px;">
            <h3>{{ $post->user->name }}</h3>
            <p>{{ $post->user->headline }}</p>
            <hr>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach

</body>
</html>
