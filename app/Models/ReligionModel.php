<?php 

namespace App\Models;
use CodeIgniter\Model;
class ReligionModel extends Model 
{
  protected $table = 'tbl_religion';
  protected $primaryKey = 'id';
  protected $allowedFields = ['religion_title', 'status', 'created_at', 'updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}