<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Smart Home Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Style css-nyaa dashboard */
        body {
            background: #A5C3DB; /* Warna latar belakang utama */
            font-family: 'Montserrat', sans-serif; /* Font utama */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px; /* Lebar dashboard */
            margin: 40px auto; /* Halaman tengah yang putih */
            background: #F8FBFF;
            border-radius: 16px; /* Pinggiran jadi agak melengkung */
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
            overflow: hidden;
            position: relative;
            padding-bottom: 30px;
        }

        @media (max-width: 900px) {
            .container {
                width: 95vw; /* Respon untuk layar kecil */
                border-radius: 16px;
            }
        }

        .header {
            padding: 24px 30px 0 30px;
        }

        .header-date {
            color: #b5b5b5;  /* Warna tanggal */
            font-size: 13px;
        }

        .header-title {
            font-size: 22px; /* Ukuran judul utama */
            font-weight: 600;
            margin: 2px 0 18px 0;
            color: #232f3e;
        }

        .weather {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            margin-left: 2px;
        }

        .weather-icon {
            width: 38px;
            height: 38px;
            background: url('https://img.icons8.com/color/48/partly-cloudy-day.png') no-repeat center center/cover;
            margin-right: 10px;
        }

        .weather-info {
            font-size: 15px;
            color: #7d8fa7;
            font-weight: 500;
        }

        .main-image {
            width: 100%;
            margin: 0 auto 18px auto;
            border-radius: 18px;
            overflow: hidden;
            display: block;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07);
        }

        .main-image img {
            width: 100%;
            display: block;
            border-radius: 18px;
        }

        /* Menu tab fitur */
        .feature-menu {
            display: flex;
            justify-content: space-around;
            background: #e7f0f8;
            border-radius: 16px;
            margin: 20px 30px 0 30px;
            padding: 10px 0 7px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .feature-item {
            cursor: pointer;
            font-size: 14px;
            color: #7d8fa7;
            opacity: 0.7;
            padding: 6px 10px;
            border-radius: 12px;
            transition: all 0.3s ease;
            user-select: none;
        }

        .feature-item.active {
            color: #232f3e;
            opacity: 1;
            font-weight: 600;
            background: #d0e6f9;
        }

        /* Grid info ringkasan */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px 18px;
            padding: 0 30px;
            margin-top: 10px;
            margin-bottom: 18px;
        }

        .info-block {
            background: #f2f7fb;
            border-radius: 12px;
            text-align: center;
            padding: 12px 0 8px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .info-label {
            color: #b5b5b5;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 17px;
            font-weight: 600;
            color: #232f3e;
            margin-bottom: 2px;
        }

        /* Bagian info untuk kipas */
        .ac-section {
            background: #f2f7fb;
            border-radius: 14px;
            margin: 12px 30px 0 30px;
            padding: 15px 18px 13px 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            font-size: 14px;
            color: #4a5a6a;
            position: relative;
        }

        .ac-header {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .ac-icon {
            width: 24px;
            height: 24px;
            background: url('https://img.icons8.com/ios-filled/50/4ac6e7/fan.png') no-repeat center center/cover;
            margin-right: 8px;
        }

        .ac-status {
            font-size: 13px;
            color: #b5b5b5;
            margin-right: 14px;
        }

        .ac-temp {
            font-size: 18px;
            font-weight: 600;
            color: #4a5a6a;
            margin-left: auto;
            margin-right: 12px;
        }

        .ac-scale {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-left: 2px;
        }

        .ac-scale-label {
            font-size: 11px;
            color: #b5b5b5;
            margin-right: 15px;
            margin-left: 0;
        }

        .ac-scale-label.selected {
            color: #4ac6e7;
            font-weight: 600;
        }

        .ac-scale-label:last-child {
            margin-right: 0;
            margin-left: 15px;
        }

        /* Tabel fitur yang bisa scroll */
        .table-wrapper {
            overflow-x: auto;
            max-width: 100%;
        }

        .table-wrapper-vertical {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            margin: 20px 30px;
            border-radius: 8px;
        }

        .json-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-size: 13px;
            color: #232f3e;
        }

        .json-table th,
        .json-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            white-space: normal;
            word-wrap: break-word;
            max-width: 150px;
        }

        .json-table thead th {
            position: sticky;
            top: 0;
            background: #d0e6f9;
            z-index: 1;
        }

        /* Menu untuk pilihan ruang (pajangan aja biar bagus) */
        .room-menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: #e7f0f8;
            border-radius: 16px;
            margin: 20px 30px 0 30px;
            padding: 10px 0 7px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }

        .room-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #7d8fa7;
            font-size: 13px;
            opacity: 0.7;
            cursor: pointer;
            transition: opacity 0.2s, color 0.2s;
            min-width: 70px;
        }

        .room-item.active {
            color: #232f3e;
            opacity: 1;
            font-weight: 600;
        }

        .room-item img {
            width: 26px;
            margin-bottom: 5px;
        }

        /* Respon untuk layar yang kecil */
        @media (max-width: 450px) {
            .container {
                width: 100vw;
                min-width: 0;
                border-radius: 0;
            }

            .info-grid,
            .ac-section,
            .feature-menu,
            .json-table {
                margin-left: 10px;
                margin-right: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-date" id="current-date">Loading date...</div>
            <div class="header-title">Welcome Home</div>
            <div class="weather">
                <div class="weather-icon"></div>
                <div class="weather-info">
                    <div style="font-size:13px; color:#b5b5b5;">Outdoor</div>
                    Partly Cloudy
                </div>
            </div>
            <div class="main-image">
                <img src="https://i.pinimg.com/736x/40/dc/9e/40dc9e60ea197b94a0db42ebf9284738.jpg" alt="Living Room" />
            </div>
        </div>

        <!-- Menu fitur -->
        <div class="feature-menu">
            <div class="feature-item active" data-feature="summary">Summary</div>
            <div class="feature-item" data-feature="temperature">Temperature</div>
            <div class="feature-item" data-feature="humidity">Humidity</div>
            <div class="feature-item" data-feature="energy">Energy</div>
            <div class="feature-item" data-feature="security">Security</div>
        </div>

        <!-- Konten utama (summary) -->
        <div id="content-summary">
            <div class="info-grid">
                <!-- Info untuk Temperature (Suhu) -->
                <div class="info-block">
                    <div class="info-label">Temperature</div>
                    <div class="info-value" id="temperature-value">Loading...</div>
                </div>
                <!-- Info untuk Humidity (Kelembaban) -->
                <div class="info-block">
                    <div class="info-label">Humidity</div>
                    <div class="info-value" id="humidity-value">Loading...</div>
                </div>
                <!-- Info untuk Kipas yang aktif -->
                <div class="info-block">
                    <div class="info-label">Fans Active</div>
                    <div class="info-value" id="fans-active">Loading...</div>
                </div>
                <!-- Info untuk Energi hari ini -->
                <div class="info-block">
                    <div class="info-label">Energy Today</div>
                    <div class="info-value" id="energy-today">Loading...</div>
                </div>
                <!-- Info untuk Status pintu -->
                <div class="info-block">
                    <div class="info-label">Door Status</div>
                    <div class="info-value" id="door-status">Loading...</div>
                </div>
                <!-- Info untuk Status alarm -->
                <div class="info-block">
                    <div class="info-label">Alarm Status</div>
                    <div class="info-value" id="alarm-status">Loading...</div>
                </div>
            </div>
            <!-- Bagian untuk status kipas -->
            <div class="ac-section">
                <div class="ac-header">
                    <div class="ac-icon"
                        style="background-image: url('https://img.icons8.com/ios-filled/50/4ac6e7/fan.png');"></div>
                    <span class="ac-status" id="fan-status">Fan Status</span>
                    <span class="ac-temp" id="fan-speed">Loading...</span>
                </div>
            </div>
        </div>

        <!-- Konten data JSON fitur (ini untuk tabel data per fiturnya) -->
        <div id="content-feature" style="display:none; padding: 0 30px;">
            <div class="table-wrapper table-wrapper-vertical">
                <table class="json-table" id="json-table">
                    <thead id="json-table-head"></thead>
                    <tbody id="json-table-body"></tbody>
                </table>
            </div>
        </div>

        <!-- Menu pilihan ruangan yang di bagian bawah -->
        <div class="room-menu">
            <div class="room-item active">
                <img src="https://img.icons8.com/ios-filled/50/4a5a6a/sofa.png" />
                <div>Living Room</div>
            </div>
            <div class="room-item">
                <img src="https://img.icons8.com/ios-filled/50/7d8fa7/kitchen.png" />
                <div>Kitchen</div>
            </div>
            <div class="room-item">
                <img src="https://img.icons8.com/ios-filled/50/7d8fa7/bedroom.png" />
                <div>Bedroom</div>
            </div>
        </div>

        <script>
            const baseUrl = '/api'; // Ini Base URL untuk api backendnyaa
            // Ambil semua elemen di tab fitur
            const featureItems = document.querySelectorAll('.feature-item');
            // Elemen konten utama (summary)
            const contentSummary = document.getElementById('content-summary');
            // Elemen konten fitur (yang tabel data)
            const contentFeature = document.getElementById('content-feature');
            // Elemen head tabel json
            const jsonTableHead = document.getElementById('json-table-head');
            // Elemen body tabel json
            const jsonTableBody = document.getElementById('json-table-body');

            // Fungsi untuk update tanggal hari di bagian header
            function updateDate() {
                const options = { year: 'numeric', month: 'short', day: 'numeric' };
                document.getElementById('current-date').textContent = new Date().toLocaleDateString('en-US', options);
            }

            // Fungsi untuk update status kipas
            function updateFanStatus(tempData) {
                // Array status tiap kipas
                const fanStatuses = [
                    { id: 1, status: tempData.fan1_status },
                    { id: 2, status: tempData.fan2_status },
                    { id: 3, status: tempData.fan3_status }
                ];

                // Menghitung jumlah kipas yang aktif (ON)
                const activeFans = fanStatuses.filter(fan => fan.status === 'ON').length;
                const fanStatusText = activeFans > 0 ? `${activeFans} Fan(s) Active` : 'All Fans OFF';

                // Update kecepatan kipas 
                const fanSpeed = tempData.fan_speed ? `${tempData.fan_speed} %` : 'N/A';

                // Update elemen status kipas di dahboard
                document.getElementById('fan-status').textContent = fanStatusText;
                document.getElementById('fan-speed').textContent = `Speed: ${fanSpeed}`;

                // Tampilan detail setatus tiap kipas contoh FAN 1 : ON/OFF
                let fanDetailEl = document.getElementById('fan-status-detail');
                if (!fanDetailEl) {
                    fanDetailEl = document.createElement('div');
                    fanDetailEl.id = 'fan-status-detail';
                    fanDetailEl.style.marginTop = '8px';
                    fanDetailEl.style.fontSize = '13px';
                    fanDetailEl.style.color = '#4a5a6a';
                    document.querySelector('.ac-section').appendChild(fanDetailEl);
                }
                fanDetailEl.textContent = fanStatuses
                    .map(fan => `Fan ${fan.id}: ${fan.status}`)
                    .join(', ');
            }

            // Fungsi update ringkasan dashboard
            async function updateSummary() {
                try {
                    // Ambil data temperature, energy, humidity, security secara paralel
                    const [tempRes, energyRes, humidityRes, securityRes] = await Promise.all([
                        fetch(`${baseUrl}/temperature`),
                        fetch(`${baseUrl}/energy`),
                        fetch(`${baseUrl}/humidity`),
                        fetch(`${baseUrl}/security`)
                    ]);
                    // Parse hasil fetch ke JSON 
                    const tempDataRaw = await tempRes.json();
                    const energyDataRaw = await energyRes.json();
                    const humidityDataRaw = await humidityRes.json();
                    const securityDataRaw = await securityRes.json();

                    // Ambil daya pertama (kalau bentuknya array)
                    const tempData = Array.isArray(tempDataRaw) ? tempDataRaw[0] : tempDataRaw;
                    const energyData = Array.isArray(energyDataRaw) ? energyDataRaw[0] : energyDataRaw;
                    const humidityData = Array.isArray(humidityDataRaw) ? humidityDataRaw[0] : humidityDataRaw;

                    // Update nilai temperature
                    document.getElementById('temperature-value').textContent = `${tempData?.value ?? '-'} ℃`;
                    // Update nilai humidity
                    document.getElementById('humidity-value').textContent = `${humidityData?.value ?? '-'}%`;

                    // Menghitung jumlah kipas yang aktif
                    const activeFans = [tempData?.fan1_status, tempData?.fan2_status, tempData?.fan3_status].filter(s => s === 'ON').length;
                    document.getElementById('fans-active').textContent = `${activeFans} Active`;

                    // Update energi hari ini
                    document.getElementById('energy-today').textContent = `${energyData?.total_today ?? '-'} kWh`;
                    // Update status pintu sama alarm
                    document.getElementById('door-status').textContent = securityDataRaw?.door_status ?? '-';
                    document.getElementById('alarm-status').textContent = securityDataRaw?.alarm_status ?? '-';

                    // Update status kipas
                    updateFanStatus(tempData);

                } catch (err) {
                    console.error('Error loading summary:', err);
                }
            }

            // Tabel dari array objek JSON
            function buildTable(data) {
                if (!Array.isArray(data) || data.length === 0) {
                    jsonTableHead.innerHTML = '<tr><th>No Data</th></tr>';
                    jsonTableBody.innerHTML = '';
                    return;
                }
                const keys = Object.keys(data[0]);
                jsonTableHead.innerHTML = '<tr>' + keys.map(k => `<th>${k}</th>`).join('') + '</tr>';
                jsonTableBody.innerHTML = data.map(row => {
                    return '<tr>' + keys.map(k => `<td>${row[k]}</td>`).join('') + '</tr>';
                }).join('');
            }

            // Loading data fitur dan untuk tampilin tabel
            async function loadFeatureData(feature) {
                console.log(`Loading data for feature: ${feature}`);
                try {
                    const res = await fetch(`${baseUrl}/${feature}`);
                    let data = await res.json();
                    if (!Array.isArray(data)) {
                        data = [data];
                    }
                    // Untuk mengurutkan data berdasarkan id dari terkecil ke terbesar
                    data.sort((a, b) => (a.id ?? 0) - (b.id ?? 0));
                    buildTable(data);
                } catch (err) {
                    console.error(`Error loading ${feature} data:`, err);
                    jsonTableHead.innerHTML = '<tr><th>Error loading data</th></tr>';
                    jsonTableBody.innerHTML = '';
                }
            }

            // Klik menu fitur
            featureItems.forEach(item => {
                item.addEventListener('click', () => {
                    featureItems.forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                    const feature = item.dataset.feature;

                    if (feature === 'summary') {
                        contentSummary.style.display = 'block';
                        contentFeature.style.display = 'none';
                        updateSummary();
                    } else {
                        contentSummary.style.display = 'none';
                        contentFeature.style.display = 'block';
                        loadFeatureData(feature);
                    }
                });
            });

            // Inisialisasi
            updateDate();
            updateSummary();
            setInterval(updateSummary, 5000);
        </script>
</body>
</html>