<div class="row justify-content-center topmargin">
    <h1><?= $title ?></h1>
</div>
<div class="row justify-content-center topmargin">
    <form action="/game/doCreate" method="post" class="col-6">
        <div class="form-group">
            <label>Name des Spiels</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Beschreibung des Spiels</label>
            <textarea class="form-control" rows="3" name="beschreibung" required></textarea>
        </div>
        <label>Bild hinzufügen</label>
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
            <label class="custom-file-label" for="customFile">Bild auswählen</label>
            <small id="emailHelp" class="form-text text-muted">Für die optimale Anzeige, wählen sie ein Bild mit einer 16:9 Auflösung.</small>
        </div>
        <div class="row justify-content-center whitespacecards">
            <button type="submit" class="btn btn-secondary" name="send">Neues Spiel hinzufügen</button>
        <div>
    </form>


    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</div>