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
            <section class="main-content-create">
                <h2 style="margin-top: 20px">About</h2>
                <div class="about d-flex">
                    <div>
                        <img class="pp" src="img/fotoKTM.jpeg" alt="gambar">
                    </div>
                    <div>
                        <ul class="about-des" style="width: 500px">
                            <a>Aplikasi ini dibuat oleh : </a> <br>
                            <div class="row d-flex">
                                <div class="col-3">Nama</div>
                                <div class="col-1">:</div>
                                <div class="col-8">Maulana Syarief H.</div>
                            </div>
                            <div class="row">
                                <div class="col-3">Prodi</div>
                                <div class="col-1">:</div>
                                <div class="col-8">D4 Teknik Informatika</div>
                            </div>
                            <div class="row">
                                <div class="col-3">NIM</div>
                                <div class="col-1">:</div>
                                <div class="col-8">2041720190</div>
                            </div>
                            <div class="row">
                                <div class="col-3">Tanggal</div>
                                <div class="col-1">:</div>
                                <div class="col-8">10 July 2024</div>
                            </div>

                        </ul>
                    </div>

                </div>

            </section>
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
