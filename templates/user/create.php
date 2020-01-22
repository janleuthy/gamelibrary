<div class="container">
    <h1><?= $title?></h1>
    <form action="/user/docreate" method="post" class="col-6">
        <div class="form-group">
            <label for="fname">Vorname</label>
            <input id="fname" name="fname" type="text" class="form-control" placeholder="Vorname" required>
        </div>
        <div class="form-group">
            <label for="lname">Nachname</label>
            <input id="lname" name="lname" type="text" class="form-control" placeholder="Nachname" required>
        </div>
        <div class="form-group">
            <label for="username">Benutzername</label>
            <input id="username" name="username" type="text" class="form-control" placeholder="Benutzername" required>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="E-Mail Adresse" required>
        </div>
        <div class="form-group">
            <label class="control-label" for="password">Passwort</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Passwort" required>
            </div>
        <div class="form-group">
            <label class="control-label" for="password2">Passwort bestätigen</label>
            <input id="password2" name="password2" type="password" class="form-control" placeholder="Passwort bestätigen" required>
            </div>
        <button type="submit" class="btn btn-secondary">Absenden</button>
    </form>
</div>