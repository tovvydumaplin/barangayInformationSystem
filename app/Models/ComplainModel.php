<?php 

namespace App\Models;
use CodeIgniter\Model;
class ComplainModel extends Model 
{
  protected $table = 'tbl_complaint';
  protected $primaryKey = 'complaint_id';
  protected $allowedFields = ['type_of_complaint','type_of_issue','complainant_id','complainant_name','complain_against','complain_aganst_id','date','complain_title','complain_details','status','created_at','updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}