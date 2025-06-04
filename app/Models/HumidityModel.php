<?php
namespace App\Models;
use CodeIgniter\Model;

class HumidityModel extends Model
{
    protected $table = 'humidities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['value', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}