<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>
<div class="row justify-content-center topmargin">
    <form class="col-6">
        <div class="form-group">
            <label for="fname">Vorname:</label>
            <label><?= $user->firstName; ?></label>
        </div>
        <div class="form-group">
            <label for="lname">Nachname:</label>
            <label><?= $user->lastName ?></label>
        </div>
        <div class="form-group">
            <label for="username">Benutzername:</label>
            <label><?= $user->username ?></label>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse:</label>
            <label><?= $user->email ?></label>
        </div>
        <div class="whitespacecards">
            <a href="/user/edit" type="submit" class="btn btn-secondary">Profil bearbeiten</a>
        </div>
    </form>
</div>