<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LinkUp Feed</title>

    <style>
        body {
            margin: 0;
            background: #f3f2ef;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            background: white;
            padding: 10px 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #0a66c2;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
        }

        .logout-btn {
            background: none;
            border: 1px solid #d32f2f;
            color: #d32f2f;
            padding: 7px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #d32f2f;
            color: white;
        }

        .container {
            width: 700px;
            margin: 30px auto;
        }

        .create-post-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.1);
        }

        .create-post-card textarea {
            width: 100%;
            height: 80px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            resize: none;
            font-family: Arial, sans-serif;
            font-size: 15px;
            box-sizing: border-box;
        }

        .create-post-card textarea:focus {
            outline: none;
            border-color: #0a66c2;
        }

        .btn-submit {
            background: #0a66c2;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            float: right;
        }

        .btn-submit:hover {
            background: #004182;
        }

        .error-message {
            color: #d32f2f;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .post {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #0a66c2;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
            margin-right: 15px;
        }

        .name {
            font-size: 18px;
            font-weight: bold;
        }

        .headline {
            color: gray;
            font-size: 14px;
        }

        .content {
            font-size: 16px;
            line-height: 1.6;
            margin-top: 15px;
        }

        .date {
            color: #777;
            font-size: 13px;
            margin-top: 15px;
        }

        .post-actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
            border-top: 1px solid #eee;
            padding-top: 12px;
        }

        .btn-action {
            background: #f3f2ef;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-action:hover {
            background: #e4e3e0;
        }

        .btn-delete {
            background: #ffebee;
            color: #c62828;
        }

        .btn-delete:hover {
            background: #ffcdd2;
        }

        .edit-form-container {
            display: none;
            margin-top: 15px;
            background: #fafafa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .edit-form-container textarea {
            width: 100%;
            height: 60px;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
            resize: none;
            box-sizing: border-box;
        }

        .btn-save {
            background: #0a66c2;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            float: right;
        }

        .comments-counter {
            font-size: 13px;
            color: #666;
            margin-top: 12px;
            padding: 0 5px;
        }

        .comment-form-container {
            border-top: 1px solid #eee;
            padding-top: 12px;
            margin-top: 8px;
        }

        .comment-input-group {
            display: flex;
            gap: 10px;
        }

        .comment-input-group input {
            flex: 1;
            background: #f3f2ef;
            border: 1px solid transparent;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .comment-input-group input:focus {
            outline: none;
            border-color: #0a66c2;
            background: white;
        }

        .btn-comment {
            background: #0a66c2;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-comment:hover {
            background: #004182;
        }

        .comments-list {
            background: #f8f9fa;
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .comment-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .comment-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #5c6bc0;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .comment-bubble {
            background: white;
            padding: 10px;
            border-radius: 8px;
            flex: 1;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            font-size: 14px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3px;
        }

        .comment-author-name {
            font-weight: bold;
            color: #333;
        }

        .comment-time {
            font-size: 11px;
            color: #777;
        }

        .comment-headline {
            font-size: 12px;
            color: #0a66c2;
            margin: 2px 0 6px 0;
            font-weight: 500;
        }

        .comment-text {
            color: #444;
            line-height: 1.4;
            margin: 0;
            word-break: break-word;
        }

        .btn-delete-comment {
            background: none;
            border: none;
            color: #c62828;
            font-size: 11px;
            cursor: pointer;
            padding: 0;
            margin-top: 4px;
            margin-left: 5px;
        }

        .btn-delete-comment:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="/feed" class="navbar-brand">LinkUp</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Se deconnecter</button>
    </form>
</nav>

<div class="container">

    <div class="create-post-card clearfix">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <textarea name="content" placeholder="Commencer un post..."></textarea>

            @error('content')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn-submit">Publier</button>
        </form>
    </div>

    @foreach($posts as $post)
        <div class="post">
            <div class="header">
                <div class="avatar">
                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                </div>
                <div>
                    <div class="name">
                        {{ $post->user->name }}
                    </div>
                    <div class="headline">
                        {{ $post->user->headline ?? 'Membre LinkUp' }}
                    </div>
                </div>
            </div>

            <div class="content">
                {{ $post->content }}
            </div>

            <div class="date">
                {{ $post->created_at->format('d/m/Y H:i') }}
            </div>

            @if(Auth::id() === $post->user_id)
                <div class="post-actions">
                    <button class="btn-action" onclick="toggleEditForm({{ $post->id }})">
                        Modifier
                    </button>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">
                            Supprimer
                        </button>
                    </form>
                </div>

                <div id="edit-form-{{ $post->id }}" class="edit-form-container clearfix">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="content">{{ $post->content }}</textarea>

                        @error('content')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="btn-save">Enregistrer</button>
                    </form>
                </div>
            @endif

            <div class="comments-counter">
                {{ $post->comments->count() }} {{ Str::plural('commentaire', $post->comments->count()) }}
            </div>

            <div class="comment-form-container">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="comment-input-group">
                        <input type="text" name="content" placeholder="Ajouter un commentaire professionnel..." required maxlength="500">
                        <button type="submit" class="btn-comment">Publier</button>
                    </div>
                    @error('content')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </form>
            </div>

            @if($post->comments->count() > 0)
                <div class="comments-list">
                    @foreach($post->comments as $comment)
                        <div class="comment-item">
                            <div class="comment-avatar">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>
                            <div class="comment-bubble">
                                <div class="comment-header">
                                    <span class="comment-author-name">{{ $comment->user->name }}</span>
                                    <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="comment-headline">
                                    {{ $comment->user->headline ?? 'Membre LinkUp' }}
                                </div>
                                <p class="comment-text">{{ $comment->content }}</p>

                                @if(Auth::id() === $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Supprimer ce commentaire ?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete-comment">Supprimer</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    @endforeach

</div>

<script>
    function toggleEditForm(postId) {
        var form = document.getElementById('edit-form-' + postId);
        if (form.style.display === 'block') {
            form.style.display = 'none';
        } else {
            form.style.display = 'block';
        }
    }
</script>

</body>
</html>
