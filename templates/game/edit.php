<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>

<form class="container">
    <div class="form-group">
        <label>Name des Spiels bearbeiten</label>
        <input type="text" class="form-control" value="<?= $game->name; ?>" required>
        <input type="hidden" value="<?= $game->id; ?>">
    </div>
    <div class="form-group">
        <label>Beschreibung des Spiels bearbeiten</label>
        <textarea class="form-control" rows="3" required><?= $game->beschreibung; ?></textarea>
    </div>
    <label>Bild hinzufügen / ändern</label>
    <div class="form-group custom-file">
        <input type="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Bild auswählen</label>
        <small id="emailHelp" class="form-text text-muted">Für die optimale Anzeige, wählen Sie ein Bild mit einer 16:9 Auflösung.</small>
    </div>
    <br>
    <button type="submit" class="btn btn-secondary">Speichern</button>
    <a class="btn btn-danger text-white" href="/game">Abbrechen</a>
</form>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>