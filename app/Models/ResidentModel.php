<?php

namespace App\Models;

use CodeIgniter\Model;

class ResidentModel extends Model
{
    protected $table      = 'tbl_residents'; // Change if your table name is different
    protected $primaryKey = 'resident_id';

    protected $allowedFields = [
        'firstname', 'middlename', 'lastname', 'suffix', 'contact_no',
        'birthdate', 'birthplace', 'citizenship', 'gender', 'civil_status',
        'occupation', 'religion', 'is_pwd', 'is_voter_of_barangay', 
        'is_family_head', 'household_name', 'house_no', 'street', 'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
