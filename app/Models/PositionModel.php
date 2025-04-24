<?php 

namespace App\Models;
use CodeIgniter\Model;
class PositionModel extends Model 
{
  protected $table = 'tbl_positions';
  protected $primaryKey = 'id';
  protected $allowedFields = ['position_name', 'status', 'created_at', 'updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}