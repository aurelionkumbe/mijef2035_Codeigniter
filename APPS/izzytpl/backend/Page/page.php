<?php 
require '../Database/bd.php';
 
/**
 * Class Page
 */
class Page
{
 
    /**
     * @var mysqli|PDO|string
     */
    protected $db;
 
    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }
 
    /**
     * Add new Page
     *
     * @param $name
     * @param $description
     *
     * @return string
     */
    public function Create($nom)
    {
        $q= $this->db->prepare("SELECT * FROM page ORDER BY position DESC LIMIT 1");
        $q->execute();
        while ($pos = $q->fetchAll(PDO::FETCH_COLUMN, 0)) {
           $positions = $pos;    
        }
        $position = $positions[0]+1;
        $query = $this->db->prepare("INSERT INTO page(nom, position) VALUES (:nom,:position)");
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("position", $position, PDO::PARAM_STR);
        $query->execute();
 
        return json_encode(['page' => [
            'id'          => $this->db->lastInsertId(),
            'nom'        => $nom,
            'lien'        => "/".$nom,
            'position' => $position
        ]]);
    }
 
    /**
     * List Tasks
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM page");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
 
        return json_encode(['pages' => $data]);
    }
 
 
    /**
     * Update Task
     *
     * @param $name
     * @param $position
     * @param $id
     */
    public function Update($nom, $position, $id, $lien)
    {
        $query = $this->db->prepare("UPDATE tasks SET nom = :nom, position = :position WHERE id = :id");
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("position", $position, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
 
    /**
     * Delete Task
     *
     * @param $task_id
     */
    public function Delete($id)
    {
        $query = $this->db->prepare("DELETE FROM page WHERE id = :id");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
}