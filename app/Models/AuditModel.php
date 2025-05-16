<?php 

namespace App\Models;
use CodeIgniter\Model;
class AuditModel extends Model 
{
  protected $table = 'tbl_audit';
  protected $primaryKey = 'id';
  protected $allowedFields = ['action', 'date','user_id', 'user', 'role' , 'token', 'created_at', 'updated_at'];

  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}