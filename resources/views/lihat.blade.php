<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Arsip Surat</title>
</head>

<body>
    {{-- sidebar --}}
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('sidebar')
            {{-- content --}}
            <div class="col py-3">
                <div class="container">
                    <h1>Lihat Surat</h1>
                    <p>Nomor</p>
                    <p>Kategori</p>
                    <p>Judul</p>
                    <p>Waktu unggah</p>
                </div>

                <embed src="{{ asset('storage/' . $surat->file) }}" type="application/pdf" width="100%"
                    height="600px" />

                <div class="container d-flex">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href = 'kategori';"
                        style="margin-right: 20px">Kembali</button>
                    <a href="{{ asset('storage/' . $surat->file) }}" class="btn btn-primary btn-sm" download>Unduh</a>
                    <a href="{{ route('edit-surat', $surat->id) }}" class="btn btn-warning btn-sm">Edit / Ganti File</a>
                </div>
            </div>
            {{-- end content --}}
        </div>
    </div>
    {{-- end sidebar --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script>
        function confirmDeletion(event) {
            event.preventDefault();
            const confirmed = confirm('Apakah Anda yakin ingin menghapus surat ini?');
            if (confirmed) {
                event.target.submit();
            }
        }
    </script>
</body>

</html>
