<?php 

namespace App\Models;
use CodeIgniter\Model;
class OfficialModel extends Model 
{
  protected $table = 'tbl_officials';
  protected $primaryKey = 'official_id';
  protected $allowedFields = ['firstname','middlename','lastname','suffix','position','status','image','start_service','end_service','created_at', 'updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}