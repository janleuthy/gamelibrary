<?php


namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class GameRepository extends Repository
{
    protected $tableName = 'games';

    public function create($name, $beschreibung, $file)
    {
        $query = "INSERT INTO $this->tableName(name, beschreibung, file) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $name, $beschreibung, $file);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

}