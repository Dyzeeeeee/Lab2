<?php

namespace App\Models;

use CodeIgniter\Model;

class MusicModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_music';
    protected $primaryKey       = 'ms_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ms_name', 'ms_path'];

    public function searchSongs($searchQuery)
    {
        // Perform a basic SQL query to search for songs
        $sql = "SELECT * FROM {$this->table} WHERE ms_name LIKE ?";

        // Use query binding to safely pass the search query
        $query = $this->query($sql, ["%$searchQuery%"]);

        // Return the results as an array
        return $query->getResultArray();
    }
    

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


 

}
