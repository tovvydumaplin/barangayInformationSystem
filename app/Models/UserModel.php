<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model 
{
  protected $table = 'tbl_account';
  protected $primaryKey = 'id';
  protected $allowedFields = ['accout_id','firstname','middlename','lastname','suffix','position','username','password','role','status'];
}