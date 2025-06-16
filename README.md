# Smart Home Dashboard

Smart Home Dashboard adalah aplikasi web berbasis CodeIgniter 4 
yang digunakan untuk memonitor dan mengontrol perangkat smart home. 
Dashboard ini menampilkan data suhu, kelembapan, status kipas, 
konsumsi energi, status pintu, dan alarm secara real-time.

## Fitur Utama

- Monitoring suhu dan kelembapan secara real-time
- Menampilkan status perangkat (kipas, pintu, alarm)
- Statistik konsumsi energi harian
- API endpoint untuk integrasi data sensor

## Tech Stack

- Backend: PHP (CodeIgniter 4)
- Frontend: HTML, CSS, JavaScript
- Database: (Sesuai yang digunakan, misal MySQL)
- API: JSON REST API

## Struktur Direktori
- app/ : Source code aplikasi (controller, model, view)
- public/ : Public assets & entry point
- tests/ : Unit test
- writable/ : File yang bisa di-write CI4 (cache, logs, dsb)
- smarthome_db.sql : File SQL untuk setup database

## Contoh Penggunaan
- Dashboard utama: http://localhost:8080/dashboard.php
- Endpoint API contoh :
GET http://localhost:8080/api/temperature
- Maka responnya adalah seperti ini :
  [
   {
        "id": "2",
        "value": "25",
        "heating": "17",
        "fan_speed": "45",
        "fan1_status": "OFF",
        "fan2_status": "OFF",
        "fan3_status": "ON",
        "created_at": "2025-05-31 06:06:57",
        "updated_at": "2025-06-05 14:08:52"
    }
  ]
