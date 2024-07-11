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
                    <h1>Kategori</h1>
                    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                </div>

                <div class="search-filter d-flex justify-content-center">
                    <form action="#" method="GET" class="d-flex w-100 justify-content-center align-items-center">
                        <span class="judul" style="margin-right: 10px; font-weight: 700">Cari Kategori:</span>
                        <input type="text" name="search" class="form-control rounded-start" placeholder="Search..."
                            aria-label="Search" aria-describedby="search-button" value="{{ request('search') }}"
                            style="width: 600px; margin: 0 10px;">
                        <button class="btn rounded-end" type="submit" id="search-button" style="background: #74512D; color: white">Cari</button>
                    </form>
                </div>

                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 20%;">ID Kategori</th>
                                <th scope="col" style="width: 20%;">Nama Kategori</th>
                                <th scope="col" style="width: 20%;">Keterangan</th>
                                <th scope="col" style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelKategori">
                            @foreach ($kategori as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <a href="{{ route('edit-kategori', $item->id) }}"class="btn btn-warning btn-sm" style="color: black">Edit / Ganti File</a>
                                    </td> <!-- Tambahkan link untuk edit -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href = 'tambahKategori';" style="background: #74512D"">Tambah Kategori</button>
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
</body>

</html>
