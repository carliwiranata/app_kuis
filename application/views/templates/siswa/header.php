<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        /* Mencegah pemilihan teks */
        body {
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Standard */
        }

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
        // Mendeteksi saat pengguna mencoba klik kanan
        window.addEventListener('contextmenu', function(e) {
            e.preventDefault(); // Mencegah menu konteks muncul saat klik kanan
        });

        // Mendeteksi saat pengguna mencoba menekan tombol keyboard
        window.addEventListener('keydown', function(e) {
            // Mencegah fungsi keyboard shortcut (Ctrl+U, F12)
            if (e.ctrlKey && (e.keyCode == 85 || e.keyCode == 123)) { // 85 untuk 'u', 123 untuk F12
                e.preventDefault(); // Mencegah aksi default
            }
        });
    </script>
    <!-- /END GA -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="flash-datagagal" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
    <div class="flash-databerhasil" data-flashdata="<?= $this->session->flashdata('berhasil') ?>"></div>