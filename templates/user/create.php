<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>
<div class="row justify-content-center topmargin">
    <form action="/user/docreate" method="post" class="col-6">
        <div class="form-group">
            <label for="fname">Vorname</label>
            <input id="fname" name="fname" type="text" class="form-control" placeholder="Vorname" required oninput="checkInputVorname(this)">
        </div>
        <div class="form-group">
            <label for="lname">Nachname</label>
            <input id="lname" name="lname" type="text" class="form-control" placeholder="Nachname" required oninput="checkInputNachname(this)">
        </div>
        <div class="form-group">
            <label class="control-label" for="username" title='Passwort Voraussetzungen:
            min. 4 Zeichen
            max. 20 Zeichen
            '>Benutzername<sup>?</sup></label>
            <input id="username" name="username" type="text" class="form-control" placeholder="Benutzername" required oninput="checkInputUserName(this)">
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="E-Mail Adresse" required oninput="checkInputEmail(this)">
        </div>
        <div class="form-group">
            <label class="control-label" for="password" title='Passwort Voraussetzungen:
            min. 8 Zeichen
            max. 20 Zeichen'>Passwort<sup>?</sup></label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Passwort" required oninput="checkInputPassword(this)">
        </div>
        <div class="form-group">
            <label class="control-label" for="password2" title='Passwort Voraussetzungen:
            min. 8 Zeichen
            max. 20 Zeichen'>Passwort bestätigen<sup>?</sup></label>
            <input id="password2" name="password2" type="password" class="form-control" placeholder="Passwort bestätigen" required oninput="checkInputPasswordRepeat(this)">
        </div>
        <div class="whitespacecards">
            <button type="submit" class="btn btn-secondary" name="send">Neuen Benutzer erstellen</button>
        </div>
    </form>
</div>