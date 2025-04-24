<?php 

namespace App\Models;
use CodeIgniter\Model;
class SuffixModel extends Model 
{
  protected $table = 'tbl_suffix';
  protected $primaryKey = 'id';
  protected $allowedFields = ['suffix_title', 'status', 'created_at', 'updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}