<?php 
namespace App\Models;
use CodeIgniter\Model;

class HouseDetails extends Model
{
    protected $table = 'tbl_house'; // Match your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['house_no', 'longitude', 'latitude'];
}
