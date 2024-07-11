<!-- resources/views/sidebar.blade.php -->
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #AF8F6F">
    <div class="d-flex flex-column align-items-center text-white min-vh-100" style="justify-content: center;">
        <a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5" style="font-family: sans-serif; font-weight: 700;margin-top: 50px;margin-left: 90px">Menu</span>
        </a>
        <hr style="width: 100%;">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-right" id="menu" style="margin-top: 20px">
            <li class="nav-item">
                <a href="/arsip" class="nav-link align-middle px-0 d-flex align-items-right" style="margin-bottom: 20px">
                    <img src="{{ asset('img/test.png') }}" alt="Arsip Icon" class="icon-image me-2" style="width: 24px; height: 24px;">
                    <span class="text-white">Arsip</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kategori" class="nav-link align-middle px-0 d-flex align-items-right" style="margin-bottom: 20px">
                    <img src="{{ asset('img/rak.png') }}" alt="Kategori Icon" class="icon-image me-2" style="width: 24px; height: 24px;">
                    <span class="text-white">Kategori Surat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/about" class="nav-link align-middle px-0 d-flex align-items-right" style="margin-bottom: 20px">
                    <img src="{{ asset('img/info.png') }}" alt="About Icon" class="icon-image me-2" style="width: 24px; height: 24px;">
                    <span class="text-white">About</span>
                </a>
            </li>
        </ul>
        
    </div>
</div>

