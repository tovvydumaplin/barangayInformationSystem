<?php 

namespace App\Models;
use CodeIgniter\Model;
class DbHistoryModel extends Model 
{
  protected $table = 'tbl_db_history';
  protected $primaryKey = 'id';
  protected $allowedFields = ['date', 'type', 'size', 'user', 'created_at', 'updated_at'];

  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}