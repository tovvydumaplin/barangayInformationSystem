<?php 
namespace App\Models;
use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'tbl_inventory';  
    protected $primaryKey = 'item_id';
    
    protected $allowedFields = ['item_id', 'item_name', 'item_quantity','item_description','in_out_reason', 'image', 'status', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
}
