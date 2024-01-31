<?php

namespace App\Models;

use App\Databases\Connection;

class Model
{
    public Connection $connection;
    public string $table;

    public function __construct()
    {
        $this->connection = new Connection();
        $this->connection->connect();
    }

    public function all()
    {
        $sql = "SELECT * FROM $this->table ORDER BY id DESC" ;
        return $this->connection->query($sql);
    }

    public function find(array $data)
    {
        $sql = "SELECT * FROM $this->table WHERE ";

        foreach ($data as $key => $value) {
            $sql .= "$key= $value AND ";
        }

        $sql = substr($sql, 0, -4); 

        return $this->connection->query($sql);
    }

    public function create(array $data)
    {
        if (empty($data) || !is_array($data)) {

            return false;
        }

        $fields = implode(', ', array_keys($data));

        $values = "'" . implode("','", array_values($data)) . "'";

        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return $this->connection->query($sql);
    }

    public function update(array $data, $id)
    {
        if (empty($data) || !is_array($data)) {

            return false;
        }

        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= "$key = '$value',";
        }

        $fields = substr($fields, 0, -1);

        $sql = "UPDATE $this->table SET $fields WHERE id = $id";
        var_dump($sql);
        return $this->connection->query($sql);
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->connection->query($sql);
    }

    public function validate(array $data, array $rules)
    {
        $errors = [];

        foreach ($rules as $field => $rule) {
            $rule = explode('|', $rule);

            foreach ($rule as $key => $value) {
                if ($value === 'required' && empty($data[$field])) {
                    $errors[$field] = 'The ' . $field . ' field is required';
                }

                if ($value === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'The ' . $field . ' field is not valid';
                }

                if ($value === 'min:6' && strlen($data[$field]) < 6) {
                    $errors[$field] = 'The ' . $field . ' field must be at least 6 characters';
                }
            }
        }

        return $errors;
    } 
}
