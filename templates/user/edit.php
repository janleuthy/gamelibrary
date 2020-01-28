<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>
<div class="row justify-content-center topmargin">
    <form class="col-6" method="post" action="/user/doEdit">
        <div class="form-group">
            <label for="fname">Vorname</label>
            <input id="fname" name="fname" type="text" class="form-control" placeholder="Vorname" value="<?= $user->firstName; ?>" required oninput="checkInputVorname(this)">
        </div>
        <div class="form-group">
            <label for="lname">Nachname</label>
            <input id="lname" name="lname" type="text" class="form-control" placeholder="Nachname" value="<?= $user->lastName; ?>" required oninput="checkInputNachname(this)">
        </div>
        <div class="form-group">
            <label for="username">Benutzername (Kann nicht mehr geändert werden)</label>
            <input id="username" name="username" disabled="disabled" type="text" class="form-control" placeholder="Benutzername" value="<?= $user->username; ?>" required oninput="checkInputUserName(this)">
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="E-Mail Adresse" value="<?= $user->email; ?>" required oninput="checkInputEmail(this)">
        </div>
        <div class="form-group">
            <label class="control-label" for="password">Neues Passwort</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Neues Passwort" value="" oninput="checkInputPassword(this)">
        </div>
        <div class="form-group">
            <label class="control-label" for="password2">Neues Passwort bestätigen</label>
            <input id="password2" name="password2" type="password" class="form-control" placeholder="Neues Passwort bestätigen" value="" oninput="checkInputPassword(this)">
        </div>
        <div class="whitespacecards">
            <button type="submit" name="post" class="btn btn-secondary">Speichern</button>
            <a class="btn btn-danger text-white" href="/user/profile">Abbrechen</a>
        </div>
    </form>
</div>