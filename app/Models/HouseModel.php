<?php 
namespace App\Models;
use CodeIgniter\Model;

class HouseModel extends Model
{
    protected $table = 'tbl_house'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['house_no', 'longitude', 'latitude', 'status'];
}
