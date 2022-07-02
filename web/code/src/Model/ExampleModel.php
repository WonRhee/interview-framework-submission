<?php

declare(strict_types = 1);

namespace Example\Model;

use Mini\Model\Model;

/**
 * Example data.
 */
class ExampleModel extends Model
{
    private int $id;
    private string $created;
    private string $code;
    private string $description;

    //-----------------------------------
    // Getters
    //-----------------------------------
    public function getId(): int
    {
        return $this->id;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    //-----------------------------------
    // Setters
    //-----------------------------------
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get example data by ID.
     *
     * @param int $id example id
     *  
     * @return ExampleModel example data
     */
    public function get(int $id): ExampleModel
    {
        $sql = '
            SELECT
                example_id AS "id",
                created,
                code,
                description
            FROM
                ' . getenv('DB_SCHEMA') . '.master_example
            WHERE
                example_id = ?';

        $result = $this->db->select([
            'title'  => 'Get example data',
            'sql'    => $sql,
            'inputs' => [$id]
        ]);

        // Set property values if exists
        foreach ($result as $key => $value) {
            if (property_exists($this, $key)) {
                $func = "set" . ucfirst($key);
                $this->$func($value);
            }
        }
        
        return $this;
    }

    /**
     * Create an example.
     *
     * @param string $created     example created on
     * @param string $code        example code
     * @param string $description example description
     *  
     * @return int example id
     */
    public function create(string $created, string $code, string $description): int
    {
        $sql = '
            INSERT INTO
                ' . getenv('DB_SCHEMA') . '.master_example
            (
                created,
                code,
                description
            )
            VALUES
            (?,?,?)';

        $id = $this->db->statement([
            'title'  => 'Create example',
            'sql'    => $sql,
            'inputs' => [
                $created,
                $code,
                $description
            ]
        ]);

        $this->db->validateAffected();

        return $id;
    }
}
