<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier mon profil - LinkUp</title>
    <style>
        body { margin: 0; background: #f3f2ef; font-family: Arial, sans-serif; }
        .navbar { background: white; padding: 10px 20px; box-shadow: 0 1px 4px rgba(0,0,0,.1); display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { color: #0a66c2; font-size: 22px; font-weight: bold; text-decoration: none; }
        .card { width: 500px; background: white; margin: 50px auto; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,.1); box-sizing: border-box; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #333; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn { background: #0a66c2; color: white; padding: 10px 20px; border: none; border-radius: 20px; font-weight: bold; cursor: pointer; width: 100%; }
        .btn:hover { background: #004182; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="/feed" class="navbar-brand">LinkUp</a>
    <a href="/feed" style="text-decoration: none; color: #0a66c2; font-weight: bold;">Retour au Feed</a>
</nav>

<div class="card">
    <h2 style="margin-top: 0; color: #333; text-align: center;">Modifier mes informations</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group">
            <label for="headline">Titre professionnel (Headline)</label>
            <input type="text" name="headline" id="headline" class="form-control" value="{{ old('headline', $user->headline) }}" placeholder="Ex: Étudiant Full-Stack Web...">
        </div>

        <div class="form-group">
            <label for="company">Entreprise / École (Company)</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $user->company) }}" placeholder="Ex: EMSI, 1337, Fac...">
        </div>

        <button type="submit" class="btn">Enregistrer les modifications</button>
    </form>
</div>

</body>
</html>
