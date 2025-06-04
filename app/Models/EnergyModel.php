<?php
namespace App\Models;
use CodeIgniter\Model;

class EnergyModel extends Model
{
    protected $table = 'energies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['total_today', 'total_month', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}