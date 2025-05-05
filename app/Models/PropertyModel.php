<?php 

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table = 'listing';
    protected $primaryKey = 'id';
    public function __construct(&$db = null)
    {
        parent::__construct($db); // Call the parent constructor with the database connection
    }
    public function insertPropertyDetails($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->affectedRows() > 0 ? true : false;
    }
    public function getListings()
    {
        return $this->db->table($this->table)->orderBy('created_at', 'DESC')->get()->getResultArray();
    }
    public function updatePropertyDetails($data)
    {
        $id = $data[$this->primaryKey];
        unset($data[$this->primaryKey]); // Remove the primary key from the data array
        if($this->db->table($this->table)->where($this->primaryKey, $id)->update($data)){
            return $this->db->table($this->table)->where($this->primaryKey, $id)->get()->getRowArray();
        } else {
            return false;
        }
    }
    public function delete_property($id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->delete();
        return $this->db->affectedRows() > 0 ? true : false;
    }
}