<?php

namespace App\Models;

use CodeIgniter\Model;

class RelationshipModel extends Model
{
    protected $table      = 'tbl_relationship';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'relationship_title',
        'status',
        'created_at',
        'updated_at'
    ];

  protected $useTimestamps = true;  // Enable automatic timestamps
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
