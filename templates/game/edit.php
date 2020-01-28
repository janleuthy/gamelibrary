<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>

<form class="container" method="post" action="/game/doEdit">
    <div class="form-group">
        <label>Name des Spiels bearbeiten</label>
        <input name="gamename" id="nameedit" type="text" class="form-control" value="<?= $game->name; ?>" required oninput="checkInputNewGame(this)">
        <input type="hidden" name="gameid" value="<?= $game->id; ?>">
    </div>
    <div class="form-group">
        <label>Beschreibung des Spiels bearbeiten</label>
        <textarea name="gametext" id="descriptionedit" class="form-control" rows="3" required oninput="checkInputGameDescription(this)"><?= $game->beschreibung; ?></textarea>
    </div>
    <button type="submit" name="send" class="btn btn-secondary">Speichern</button>
    <a class="btn btn-danger text-white" href="/game">Abbrechen</a>
</form>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>