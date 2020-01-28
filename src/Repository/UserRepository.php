<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $username
     * @param $password Wert für die Spalte password
     *
     * @return
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($firstName, $lastName, $email, $username, $password)
    {
        // Erstellen des Users
        if (strlen($firstName) > 1 && strlen($lastName) > 1 &&
            strlen($password) > 7 && strlen($password) < 21 &&
            strlen($email) > 1 && strlen($username) > 3 &&
            strlen($username) < 21) {
            $password = sha1($password);

            $query = "INSERT INTO $this->tableName (firstName, lastName, email, username, password) VALUES (?, ?, ?, ?, ?)";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('sssss', $firstName, $lastName, $email, $username, $password);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }
            return $statement->insert_id;
        }
    }
    public function login($username, $password) {
        // Log In User
        $password = sha1($password);

        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE username=? AND password=?";
        echo $query. " ". $username. " ". $password;
        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Session start
        session_start();
        $_SESSION["count"] = 0;
        $_SESSION["user"]["username"] = $row->username;
        $_SESSION["user"]["id"] = $row->id;

        // Den gefundenen Datensatz zurückgeben
        // return $row;
    }
    public function editEntry($firstName, $lastName, $email, $password, $id) {
        // User editieren
        if (strlen($firstName) > 3 && strlen($lastName) > 3 &&
            strlen($password) > 7 && strlen($password) < 21) {

            $query = "UPDATE $this->tableName SET firstName=?, lastName=?, email=?, password=? WHERE id=?";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('ssssi', $firstName, $lastName, $email, sha1($password), $id);
        }
        else if (strlen($firstName) > 3 && strlen($lastName) > 3) {
            $query = "UPDATE $this->tableName SET firstName=?, lastName=?, email=? WHERE id=?";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('sssi', $firstName, $lastName, $email, $id);
        }

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
}
