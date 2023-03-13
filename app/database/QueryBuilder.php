<?php

namespace App\App\Database;
use \PDO;

class QueryBuilder
{
    protected $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param $table
     * @param $fetchClass
     * @param $id
     * @return array|false
     */
    public function first($table, $fetchClass=null, $id=0)
    {
        $query = $this->db->query("select * from {$table} where id = {$id}");

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $table
     * @param $fetchClass
     * @param $order
     * @return array|false
     */
    public function all($table, $fetchClass=null, $order=null)
    {
        $query = $this->db->query("select * from {$table} {$order}");

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $table
     * @param $parameters
     * @return void
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    /**
     * @param $table
     * @param $parameters
     * @param $id
     * @return void
     */
    public function update($table, $parameters, $id=0)
    {
        $str = '';

        foreach (array_keys($parameters) as $key => $value)
        {
            $str .= $value.'=:'.$value;

            if ($key != count(array_keys($parameters)) -1) {
                $str .= ', ';
            }
        }

        $sql = sprintf(
                "UPDATE %s SET %s WHERE id={$id}",
                $table,
                $str
        );

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    /**
     * @param $table
     * @param $id
     * @return void
     */
    public function delete($table, $id=0)
    {
        $stmt = $this->db->prepare( "DELETE FROM {$table} WHERE id =:id" );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}