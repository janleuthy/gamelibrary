<?php


namespace App\Repository;


class GamesRepository extends Repository
{
    protected $tableName = 'games';

    public function createGame($name, $beschreibung)
    {
        $query = "INSERT INTO $this->tableName (name , beschreibung) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $name, $beschreibung);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

}