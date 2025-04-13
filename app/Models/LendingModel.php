<?php 
namespace App\Models;
use CodeIgniter\Model;

class LendingModel extends Model
{
    protected $table = 'tbl_lending';  
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['item_id', 'item_name', 'borrower_id', 'borrower_name',  'borrowed_quantity','borrower_desc', 'status','date_borrowed', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
}
