<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Surat</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('sidebar') <!-- Include sidebar.blade.php -->
            <div class="col py-3">
                <div class="container">
                    <h1>Edit Surat</h1>
                </div>
                <div class="container">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('update-surat', ['id' => $surat->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Method spoofing untuk mengirimkan PUT request -->
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <p class="mb-0">Nomor surat</p>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="nomor_surat" placeholder="Nomor Surat"
                                    value="{{ $surat->nomor_surat }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <p class="mb-0">Kategori</p>
                            </div>
                            <div class="col-md-9">
                                <select class="form-select" aria-label="Default select example" name="kategori_id">
                                    <option selected disabled>Pilih kategori...</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $surat->kategori_id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <p class="mb-0">Judul</p>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="judul" placeholder="Judul"
                                    value="{{ $surat->judul }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <p class="mb-0">File Surat (PDF)</p>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="file" id="formFileDisabled" name="file">
                            </div>
                        </div>

                        <div class="container d-flex">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href = '/arsip';"
                                style="margin-right: 20px">Kembali</button>
                            <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        document.addEventListener('DOMContentLoaded', function() {
            var alertElement = document.querySelector('.alert');
            if (alertElement) {
                setTimeout(function() {
                    alertElement.classList.add('fade');
                    setTimeout(function() {
                        alertElement.remove();
                    }, 500); // Waktu fade out transition
                }, 1500); // Waktu tunggu sebelum menghilang
            }
        });
    </script>
</body>

</html>
