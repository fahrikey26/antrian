<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Antrian Pembayaran Sekolah</h1>

        <form action="{{ route('ambiltiket.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Ambil Antrian</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>