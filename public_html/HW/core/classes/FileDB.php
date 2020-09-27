<?php

class FileDB
{

    private  $file_name;
    private  $data;

    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
        $this->data = [];
    }

    /**
     * Sets temporary data ($this->data) to passed array
     * 
     * @param array $data_array
     */
    public function setData(array $data_array)
    {
        $this->data = $data_array;
    }

    /**
     * Returns temporary data
     * 
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Saves temporary data array to file as json-encoded string
     *
     * @return bool
     */
    public function save(): bool
    {
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);
        if ($bytes_written === false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Sets temporary data to decoded json file
     *
     */
    public function load()
    {
        if (file_exists($this->file_name)) {
            $data = file_get_contents($this->file_name);
            $decoded = json_decode($data, true);
            $this->data = $decoded;
        } else {
            $this->data = [];
        }
    }

    public function createTable($table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
    }

    public function tableExists($table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Delete table if it exists
     */
    public function dropTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
        }
    }


    /**
     * Resets array to an empty array
     */
    public function truncateTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        } else {
            return false;
        }
    }



    /**
     *Inserts row with its index in $data array
     *
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id === null) {
            $this->data[$table_name][] = $row;
            //Finds last index of array
            return array_key_last($this->data[$table_name]);
        } else {
            if (!$this->rowExists($table_name, $row_id)) {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            }
        }

        return false;
    }

    /**
     * Checks if row exists
     *
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }

        return false;
    }

    /**
     * Update $row array if index exists
     *
     * @param $table_name
     * @param $row_id
     * @param $row
     * @return bool
     */
    public function updateRow(string $table_name, $row_id, array $row): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }

        return false;
    }

    /**
     * Delete row according to index provided
     *
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }

        return false;
    }


    /**
     * Return row according to index provided
     *
     * @param string $table_name
     * @param $row_id
     * 
     */
    public function getRowById($table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        } else {
            return false;
        }
    }

    // public function getRowsWhere($table_name, array $conditions)
    // {
    //     if ($this->tableExists($table_name)) {
    //         $test_arr = [];
    //         $test_key = [];
    //         $new = [];
    //         foreach ($this->data[$table_name] as $key => $row) {
    //             foreach ($row as $key => $item) {
    //                 foreach ($conditions as $test_key => $condition) {
    //                     $test_arr = $condition;
    //                     $test_key = $test_key;
    //                     var_dump($test_key);
    //                 }
    //                 if ($test_arr === $item && $test_key === $key) {
    //                     $new[$key] = $item;
    //                 }
    //             }
    //         }
    //         return $new;
    //     }
    // }


        /**
     * Returns array of rows based on conditions
     *
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowsWhere(string $table_name, array $conditions): array
    {
        $results = [];
        $table = $this->data[$table_name];

        foreach ($table as $row_key => $row) {
            $success = true;
            
            foreach ($conditions as $cond_key => $comparison_value_1) {
                $comparison_value_2 = $row[$cond_key];
//                var_dump(['condition key' => $cond_key, 'condition value' => $condition, 'row' => $row]);
                if ($comparison_value_1 !== $comparison_value_2) {
                    $success = false;
                    break;
                }
            }
            if ($success) {
                $results[] = $row;
            }
        }
        return $results;
    }
}