<?php
// cekim.json verisini oku
$jsonData = file_get_contents('cekim.json');
$data = json_decode($jsonData, true);

// Bekleyen işlem sayısı
$totalTransactions = count($data);

// Toplam MemeX (işlem başına 500.000)
$totalAmount = $totalTransactions * 500000;

// GAS token (işlem başına 0.1)
$gasTokenAmount = $totalTransactions * 0.1;

// tam.json verisini oku
$tamJsonData = file_get_contents('tam.json');
$tamData = json_decode($tamJsonData, true);

// Gönderilen işlem sayısı
$totalSent = count($tamData);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanC Referans Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        h1 {
            color: #76ff03;
        }
        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
            border: none;
            margin-bottom: 1rem;
        }
        .card h4 {
            color: #76ff03;
        }
        .card h3 {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">PlanC Referans Dashboard</h1>

        <!-- Responsive Kutular -->
        <div class="row mb-4">
            <div class="col-12 col-md-3">
                <div class="card p-3 shadow-sm text-center">
                    <h4>Toplam MemeX</h4>
                    <h3><?= number_format($totalAmount, 0, ',', '.') ?> MemeX</h3>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card p-3 shadow-sm text-center">
                    <h4>Bekleyen İşlem Sayısı</h4>
                    <h3><?= $totalTransactions ?></h3>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card p-3 shadow-sm text-center">
                    <h4>GAS Token</h4>
                    <h3><?= number_format($gasTokenAmount, 1, ',', '.') ?> GAS</h3>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card p-3 shadow-sm text-center">
                    <h4>Gönderilen</h4>
                    <h3><?= $totalSent ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
