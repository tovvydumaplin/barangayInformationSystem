<?php 

namespace App\Models;
use CodeIgniter\Model;
class BlotterModel extends Model 
{
  protected $table = 'tbl_blotter';
  protected $primaryKey = 'blotter_id';
  protected $allowedFields = ['blotter_complainant_id','blotter_complainant_name','blotter_respondent_id','blotter_respondent_name','blotter_date','blotter_title','blotter_details','blotter_status','created_at','updated_at'];
  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}