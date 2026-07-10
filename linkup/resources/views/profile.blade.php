<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil de {{ $user->name }} - LinkUp</title>
    <style>
        body { margin: 0; background: #f3f2ef; font-family: Arial, sans-serif; }
        .navbar { background: white; padding: 10px 20px; box-shadow: 0 1px 4px rgba(0,0,0,.1); display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { color: #0a66c2; font-size: 22px; font-weight: bold; text-decoration: none; }
        .container { width: 700px; margin: 30px auto; }

        .profile-card { background: white; border-radius: 10px; padding: 30px; margin-bottom: 25px; box-shadow: 0 2px 8px rgba(0,0,0,.1); text-align: center; position: relative; }
        .profile-avatar { width: 100px; height: 100px; border-radius: 50%; background: #0a66c2; color: white; display: flex; align-items: center; justify-content: center; font-size: 40px; font-weight: bold; margin: 0 auto 15px auto; }
        .profile-name { font-size: 24px; font-weight: bold; margin: 10px 0; }
        .profile-headline { color: #0a66c2; font-size: 16px; font-weight: 500; margin: 5px 0; }
        .profile-company { color: gray; font-size: 14px; margin: 5px 0; }

        .posts-title { font-size: 18px; font-weight: bold; color: #333; margin-bottom: 15px; padding-left: 5px; }
        .post { background: white; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        .post-date { color: #777; font-size: 13px; margin-top: 10px; }
        .post-stats { font-size: 13px; color: #666; margin-top: 12px; border-top: 1px solid #eee; padding-top: 8px; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="/feed" class="navbar-brand">LinkUp</a>
    <a href="/feed" style="text-decoration: none; color: #0a66c2; font-weight: bold;">Retour au Feed</a>
</nav>

<div class="container">

    <div class="profile-card">
        <div class="profile-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div class="profile-name">{{ $user->name }}</div>
        <div class="profile-headline">{{ $user->headline ?? 'Membre professionnel chez LinkUp' }}</div>
        @if($user->company)
            <div class="profile-company">🏢 Actuellement chez <strong>{{ $user->company }}</strong></div>
        @endif
    </div>

    <div class="posts-title">Historique des publications ({{ $user->posts->count() }})</div>

    @forelse($user->posts as $post)
        <div class="post">
            <div style="font-size: 16px; line-height: 1.6;">
                {{ $post->content }}
            </div>
            <div class="post-date">
                Publié le {{ $post->created_at->format('d/m/Y H:i') }}
            </div>
            <div class="post-stats">
                 {{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }} |
                 {{ $post->comments->count() }} {{ Str::plural('commentaire', $post->comments->count()) }}
            </div>
        </div>
    @empty
        <p style="text-align: center; color: gray; margin-top: 20px;">Cet utilisateur n'a encore rien publié.</p>
    @endforelse

</div>

</body>
</html>
