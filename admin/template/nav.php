<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class=" container-fluid  ">
        <a class="navbar-brand" href="#pablo">
            <h6>Selamat Datang
                <?= $_SESSION['user']['username']; ?> di Aplikasi Parking
            </h6>
        </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a onclick="return confirm('Apakah Anda yakin ingin keluar?');" class="nav-link" href="../config/do_logout.php">
                        <p class="btn btn-danger">Keluar <i class="bi bi-box-arrow-right"></i></p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>