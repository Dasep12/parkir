<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.min.css') ?>">

    <script src="<?= base_url('assets/') ?>js/jquery-3.5.1.js"></script>
    <title>Parkir</title>
</head>

<body>
    <!-- navbar menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img class="img-thumbnail img" height="30px" width="90px" src="<?= base_url('assets/img/screen-0.svg') ?>">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav  ml-5">
                <a class="nav-link active" href="<?= base_url('Home') ?>">Home</a>
                <a class="nav-link active" href="<?= base_url('Histori') ?>">Histori</a>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <?= $contents; ?>
    <!-- end of content -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?= base_url('assets/js') ?>/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js') ?>/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js') ?>/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js') ?>/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/js') ?>/dataTables.bootstrap4.min.js"></script>

</body>

</html>