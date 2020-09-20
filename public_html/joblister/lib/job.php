<?php

class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get all jobs
    public function getAllJobs(){
        $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.company_id = categories.id ORDER BY post_date DESC ");

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get Categories
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get Jobs by Category
    public function getByCategory($category){
        $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.company_id = categories.id
         WHERE jobs.category_id = $category
        ORDER BY post_date DESC ");

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
}