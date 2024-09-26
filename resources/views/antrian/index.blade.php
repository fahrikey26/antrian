<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="5"> <!-- Refresh halaman setiap 5 detik -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Antrian Pembayaran Sekolah</h1>

        <h3>Daftar Antrian</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($antrian as $data)
                <tr>
                    <td>{{ str_pad($data->nomor_antrian, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                        <form action="{{ route('antrian.process', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <!-- Tambahkan event untuk memutar suara nomor urut ketika tombol ditekan -->
                            <button class="btn btn-warning" onclick=`playQueueSound("{{ str_pad($data->nomor_antrian, 3,'0', STR_PAD_LEFT) }}")`>Proses</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript untuk memutar audio -->
    <script>
        function playQueueSound(number) {
            const audioFiles = [
                new Audio(`{{ asset('Sound/nomor.mp3 ') }}`),
                new Audio(`{{ asset('Sound/urut.mp3 ') }}`),
                new Audio(`{{ asset('Sound/0.mp3 ') }}`),
                new Audio(`{{ asset('Sound/1.mp3 ') }}`),
                new Audio(`{{ asset('Sound/2.mp3 ') }}`)
            ];

            // Fungsi untuk memainkan audio satu per satu
            let index = 0;

            function playNext() {
                if (index < audioFiles.length) {
                    audioFiles[index].play();
                    audioFiles[index].onended = playNext;
                    index++;
                }
            }

            playNext(); // Mulai memainkan audio
        }
    </script>


</body>

</html>