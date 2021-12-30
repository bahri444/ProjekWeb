<?php
class Database
{
    protected $table;
    protected $id;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=ukm', 'root', 'bahrysemet');
    }
    // mengambil semua data dari table
    public function all()
    {
        $data = $this->db->prepare("SELECT * FROM $this->table ORDER BY id DESC");
        $data->execute();
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
    // mengambil data berdasarkan id
    public function find($id)
    {
        $data = $this->db->prepare("SELECT * FROM  $this->table WHERE $this->id = $id");
        $data->execute();
        return $data->fetch(PDO::FETCH_OBJ);
    }
    public function getWhere($id, $type = false)
    {
        $where = [];
        foreach ($id as $field => $value) {
            $where[] = "`" . $field . "` = '" . $value . "'";
        }
        $where = implode(' AND ', $where);
        $data = $this->db->prepare("SELECT * FROM $this->table WHERE $where");
        $data->execute();
        if ($type) {
            return $data->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $data->fetch(PDO::FETCH_OBJ);
        }
    }
    public function save($data)
    {
        $fields = [];
        $values = [];
        foreach ($data as $field => $value) {
            $fields[] = "`" . $field . "`";
            $values[] = "'" . $value . "'";
        }
        $fields = implode(',', $fields);
        $values = implode(',', $values);
        $data = $this->db->prepare("INSERT INTO $this->table ($fields) VALUES ($values)");
        $data->execute();
    }
    public function edit($id, $data)
    {
        $update = [];
        foreach ($data as $field => $value) {
            $update[] = "`" . $field . "` = '" . $value . "'";
        }
        $update = implode(',', $update);
        $data = $this->db->prepare("UPDATE $this->table SET $update WHERE $this->id = $id");
        $data->execute();
    }
    public function delete($id)
    {
        $data = $this->db->prepare("DELETE FROM $this->table WHERE $this->id = $id");
        $data->execute();
    }
}