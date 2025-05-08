<?php 
namespace App\Models;
use CodeIgniter\Model;

class ConsumableModel extends Model
{
    protected $table = 'tbl_consumables';  
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'item_name', 'item_quantity','item_description',  'status', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
}
