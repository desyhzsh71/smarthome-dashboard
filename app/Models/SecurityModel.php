<?php
namespace App\Models;
use CodeIgniter\Model;

class SecurityModel extends Model
{
    protected $table = 'securities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['door_status', 'alarm_status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}