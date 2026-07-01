<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LinkUp - Connexion</title>
    <style>
        body { margin:0; background:#f3f2ef; font-family:Arial, sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; }
        .auth-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,.1); width: 400px; }
        h2 { color: #0a66c2; text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; font-size: 14px; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; background: #0a66c2; color: white; border: none; padding: 12px; border-radius: 25px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 10px; }
        button:hover { background: #004182; }
        .error { color: #cc0000; font-size: 13px; margin-top: 5px; }
        .link { text-align: center; margin-top: 15px; font-size: 14px; }
        .link a { color: #0a66c2; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="auth-card">
    <h2>Se connecter à LinkUp</h2>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Adresse Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Connexion</button>
    </form>

    <div class="link">
        Nouveau sur LinkUp ? <a href="{{ route('show.register') }}">S'inscrire</a>
    </div>
</div>

</body>
</html>
