<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>

<div class="row justify-content-center whitespacecards">
    <?php foreach ($games as $game): ?>
    <div class="card cards">
        <img class="card-img-top" src="<?= $game->file; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $game->name; ?></h5>
            <p class="card-text"><?= $game->beschreibung; ?></p>
            <a href="#" class="btn btn-secondary">Ändern</a>
            <a href="#" class="btn btn-danger rightalign">Löschen</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="row justify-content-center whitespacecards">
    <a href="/game/create" class="btn btn-dark btn-lg">Neues Spiel erfassen</a>
</div>