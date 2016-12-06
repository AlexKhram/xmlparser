<?php

namespace Alex\Model;

class User extends Model
{
    protected $table = 'users';

    public function getUserIdByFullName($name, $surname)
    {
        $name = addslashes($name);
        $surname = addslashes($surname);
        $user = $this->app['db']->fetchAssoc(
            "SELECT * FROM {$this->table} WHERE name = ? and surname = ?",
            [
                $name,
                $surname
            ]
        );
        if (isset($user['id'])) {
            return $user['id'];
        }

        return '';
    }

    public function addNewUser($name, $surname, $age)
    {
        $name = addslashes($name);
        $surname = addslashes($surname);
        $age = (int)$age;
        $affectedRow = $this->app['db']->executeUpdate(
            "INSERT INTO {$this->table} (name, surname, age) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE age = ?",
            [
                $name,
                $surname,
                $age,
                $age
            ]
        );
        if ($affectedRow === 0) {
            return '';
        }

        return $this->app['db']->lastInsertId();
    }
}