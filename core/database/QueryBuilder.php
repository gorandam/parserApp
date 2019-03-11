<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        // var_dump($statement);
        // die();

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     *
     * Here we have refactor this dinamicaly to make this flexibile as posible
     *
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
         $table,
         implode(', ', array_keys($parameters)),
         ':' . implode(', :', array_keys($parameters))
        );

        // var_dump($sql);
        // die();
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whops something went wront!');
        }
    }
}
