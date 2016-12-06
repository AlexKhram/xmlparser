<?php

namespace Alex\Model;

class Pay extends Model
{
    protected $table = "pays";

    public function addPays($userId, $countPays, $successPays, $errorPays)
    {
        $countPays = (int)$countPays;
        $successPays = (int)$successPays;
        $errorPays = (int)$errorPays;

        $this->app['db']->executeQuery(
            "INSERT INTO {$this->table} (user_id, count_pays, success_pays, error_pays) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE count_pays = ?, success_pays = ?, error_pays = ?",
            [
                $userId,
                $countPays,
                $successPays,
                $errorPays,
                $countPays,
                $successPays,
                $errorPays
            ]
        );

        $dataId = $this->app['db']->lastInsertId();
        return $dataId;
    }

    public function getAllDataWithUser()
    {
        return $this->app['db']->fetchAll("SELECT users.name, users.surname, users.age, pays.count_pays, pays.success_pays, pays.error_pays  FROM users LEFT JOIN pays ON users.id = pays.user_id");
    }
}