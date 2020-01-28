<?php


namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class GameRepository extends Repository
{
    protected $tableName = 'games';

    public function fileUpload()
    {

        $upload_folder = 'upload/'; //Das Upload-Verzeichnis
        $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        // Überprüfung der Dateiendung
        $allowed_extensions = array('png', 'jpg', 'jpeg');
        if (!in_array($extension, $allowed_extensions)) {
            return "";
        }

        // Überprüfung dass das Bild keine Fehler enthält
        if (function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
            $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
            $detected_type = exif_imagetype($_FILES['file']['tmp_name']);
            if (!in_array($detected_type, $allowed_types)) {
                return "";
            }
        }

        // Pfad zum Upload
        $new_path = $upload_folder . $filename . '.' . $extension;

        // Neuer Dateiname falls die Datei bereits existiert
        if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
            $id = 1;
            do {
                $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
                $id++;
            } while (file_exists($new_path));
        }

        // Verschiebe Datei an neuen Pfad

        if (move_uploaded_file($_FILES['file']['tmp_name'], $new_path)) {
            return $new_path;
        }
        return "";
    }

    public function create($name, $beschreibung, $user_id)
    {
        // Erstellen des Games, Eintrag in die Datenbank
        if (strlen($name) > 1 && strlen($name) < 40 &&
            strlen($beschreibung) > 1 && strlen($beschreibung) < 100) {
            $filename = $this->fileUpload();

            $query = "INSERT INTO $this->tableName(name, beschreibung, file, user_id) VALUES (?, ?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('sssi', $name, $beschreibung, $filename, $user_id);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }
    }

    public function editEntry($name, $beschreibung, $id)
    {
        // Editieren/update des Games
        if (strlen($name) > 1 && strlen($name) < 40 &&
            strlen($beschreibung) > 1 && strlen($beschreibung) < 100) {
            $query = "UPDATE $this->tableName SET name=?, beschreibung=? WHERE id=?";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('ssi', $name, $beschreibung, $id);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }

            return $statement->insert_id;
        }
    }

    public function readAllByUserId($userId){
        // User aus der Datenbank per id auslesen
        $query = "SELECT * FROM {$this->tableName} WHERE user_id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userId);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

}