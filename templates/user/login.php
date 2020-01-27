<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>
<div class="row justify-content-center topmargin">
    <form class="col-6" action="/user/doLogin" method="post">
        <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="InputPassword">Passwort</label>
            <input name="password" type="password" class="form-control" id="InputPassword" placeholder="Password" required>
        </div>
        <button name="login" type="submit" class="btn btn-secondary">Login</button>
    </form>
</div>
