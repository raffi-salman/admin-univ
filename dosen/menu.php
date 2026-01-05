<nav class="navbar navbar-expand-lg navbar -light bg-light">
    <div class="container-fluid">
        <a clsas="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggler="collapse" data-bs-target="#navbarSupportedContent"
            aria- controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Data Dosen
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="tampil_dosen.php">Data Dosen</a></li>
                        <li><a class="dropdown-item" href="../mahasiswa/tampil_mahasiswa.php">Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="tampil_dosen.php">Dosen</a></li>
                        <li><a class="dropdown-item" href="../matakuliah/tampil_matakuliah.php">Mata Kuliah</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Menu lainnya</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>