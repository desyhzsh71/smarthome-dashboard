<?php
namespace App\Controllers\Api;
use App\Models\TemperatureModel;
use CodeIgniter\RESTful\ResourceController;

class Temperature extends ResourceController
{
    protected $modelName = 'App\Models\TemperatureModel';
    protected $format = 'json';

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    public function index()
    {
        $data = $this->model->orderBy('updated_at', 'DESC')->findAll();

        if ($data) {
            return $this->respond($data);
        }

        return $this->respond(['message' => 'No data found'], 404);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);

        if ($this->model->insert($data)) {
            return $this->respond(['status' => 'success', 'id' => $this->model->getInsertID()]);
        }

        return $this->respond(['status' => 'error', 'message' => 'Failed to insert'], 500);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (isset($data['updated_at'])) {
            unset($data['updated_at']);
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($this->model->update($id, $data)) {
            return $this->respond(['status' => 'updated']);
        }

        return $this->respond(['status' => 'error'], 500);
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->respond(['status' => 'error', 'message' => 'ID is required'], 400);
        }

        if ($this->model->delete($id)) {
            return $this->respond(['status' => 'deleted']);
        }

        return $this->respond(['status' => 'error', 'message' => 'Failed to delete'], 500);
    }

    public function options($id = null)
    {
        return $this->respond(null, 200);
    }
}