<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="5"> <!-- Refresh halaman setiap 5 detik -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Antrian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .monitor-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .monitor-box {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 80px;
            margin: 0;
            color: #333;
        }

        p {
            font-size: 24px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="monitor-container">
        <div class="monitor-box">
            <!-- Antrian Berikutnya -->
            <h1>
                @if($antrianBerikutnya)
                {{ str_pad($antrianBerikutnya->nomor_antrian, 3, '0', STR_PAD_LEFT) }}
                @else
                -
                @endif
            </h1>
            <p>Nomor Antrian Berikutnya</p>
        </div>
    </div>

</body>

</html>