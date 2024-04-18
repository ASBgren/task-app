<?php

declare(strict_types=1);


namespace App\Models;


use PDO;

class TaskModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * A mock model method, rather than actually using this models PDO connection
     * this method just returns a hard coded array.
     * In reality the model would be using the database connection to do this,
     * we've just hardcoded the data so you don't have to set up a database.
     */
    public function getTasks(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `task_name`, `completed_tasks`, `created` FROM `tasks` WHERE `completed_tasks` = 0'
        );
        $query->execute();
        return $query->fetchAll();

    }

    public function addTask(array $tasks): void
    {
        $query = $this->db->prepare(
            'INSERT INTO `tasks` (`task_name`) VALUES (:taskName)'
        );
        $query->bindParam(':taskName', $tasks['task_name']);
        $query->execute();
    }

    public function getCompletedTasks(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `task_name`, `completed_tasks`, `created` FROM `tasks` WHERE `completed_tasks` = 1'
        );
        $query->execute();
        return $query->fetchAll();
    }

    public function completeTasks($idToComplete)
    {
        // Passing a variable into an SQL query is naughty, use bindParam instead
        $query = $this->db->prepare(
            "UPDATE `tasks` SET `completed_tasks` = 1 WHERE `id` = $idToComplete"
        );
        $query->execute();
    }

    public function deleteTask($idToDelete)
    {
        $query = $this->db->prepare(
            "DELETE FROM `tasks` WHERE `id` = $idToDelete"
        );
        $query->execute();
    }

    public function editTask($idToEdit, $newText)
    {
        $query = $this->db->prepare(
            "UPDATE `tasks` SET `task_name` = '$newText' WHERE `id` = $idToEdit"
        );
        $query->execute();
    }

}