<?php 
namespace App\Models;
use CodeIgniter\Model;

class ConsumableInventoryHistory extends Model
{
    protected $table = 'tbl_consumables_history';  
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'item_name', 'type','quantity','old_quantity','new_quantity','updated_by', 'in_out_reason', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
protected $updatedField  = 'updated_at';

}
