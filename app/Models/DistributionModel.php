<?php

namespace App\Models;

use CodeIgniter\Model;

class DistributionModel extends Model
{
    protected $table      = 'tbl_distributions';
    protected $primaryKey = 'distribution_id';

    protected $allowedFields = [
        'recipient_id',
        'item_id',
        'description',
        'quantity',
        'distribution_date',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // not updating after distribution, so left blank

    protected $returnType    = 'array';
}
