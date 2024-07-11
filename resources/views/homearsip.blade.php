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

    <style>
        .container-isi {
            max-height: 400px; /* Adjust the height as needed */
            overflow-y: auto;
            border: 1px solid #ccc;
        }
        .table {
            margin-bottom: 0; /* Ensure no extra margin at the bottom */
        }
    </style>

</head>

<body>
    {{-- sidebar --}}
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('sidebar')
            {{-- content --}}
            <div class="col py-3">
                <div class="container">
                    <h1>Arsip Surat</h1>
                    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                </div>

                <div class="search-filter d-flex justify-content-center">
                    <form action="#" method="GET" class="d-flex w-100 justify-content-center align-items-center">
                        <span class="judul" style="margin-right: 10px; font-weight: 700">Cari Surat:</span>
                        <input type="text" name="search" class="form-control rounded-start" placeholder="Search..."
                            aria-label="Search" aria-describedby="search-button" value="{{ request('search') }}"
                            style="width: 600px; margin: 0 10px;">
                        <button class="btn rounded-end" type="submit" id="search-button" style="background: #74512D; color: white">Cari</button>
                    </form>
                </div>

                <div class="container-isi" style="max-height: 400px; overflow-y: auto; border: 1px solid #ccc;margin-top: 20px; margin-left: 25px">
                    <table class="table table-bordered">
                        <thead style="position: sticky; top: 0; background-color: white; z-index: 1;">
                            <tr>
                                <th scope="col" style="width: 20%;">Nomor Surat</th>
                                <th scope="col" style="width: 20%;">Kategori</th>
                                <th scope="col" style="width: 20%;">Judul</th>
                                <th scope="col" style="width: 20%;">Waktu Pengarsipan</th>
                                <th scope="col" style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSurat">
                            @foreach ($surat as $surat)
                                <tr>
                                    <td>{{ $surat->nomor_surat }}</td>
                                    <td>{{ $surat->kategori->nama_kategori }}</td>
                                    <td>{{ $surat->judul }}</td>
                                    <td>{{ $surat->created_at }}</td>
                                    <td>
                                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirmDeletion(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <a href="{{ asset('storage/' . $surat->file) }}" class="btn btn-primary btn-sm" download>Unduh</a>
                                        <a href="{{ route('lihat', $surat->id) }}" class="btn btn-warning btn-sm" >Lihat Surat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="container">
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href = 'tambahsurat';" style="margin-top: 20px; background: #74512D">Arsipkan Surat</button>
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
