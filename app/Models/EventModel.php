<?php 

namespace App\Models;
use CodeIgniter\Model;
class EventModel extends Model 
{
  protected $table = 'tbl_event';
  protected $primaryKey = 'event_id';
  protected $allowedFields = ['event_id','event_title','event_description','start_date','end_date','status','created_at','updated_at'];
  protected $useTimestamps = true;  
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
