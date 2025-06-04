<?php namespace App\Models;
use CodeIgniter\Model;

class TemperatureModel extends Model
{
    protected $table = 'temperatures';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'value', 'heating', 'fan_speed', 'fan1_status', 'fan2_status', 'fan3_status', 'humidity', 'door_status'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}