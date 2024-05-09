<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Site para uma loja de dispositivos electrônicos" />
    <meta name="keywords" content="Loja LGPJ, electrônicos, electro-domesticos" />
    <!-- style css -->
    <link rel="shortcut icon" href="assets/images/payments.png" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dash.css" />
    <?= $this->section('style') ?>
    <title>Loja LGPJ</title>
</head>
<body>
    
    <div class="content-main">
        <div class="content-main--left">
            <!-- start navbar -->
            <section class="navbar">
                <?php $this->insert('dash/partials/nav') ?>
            </section>
            <!-- end navbar -->
        </div>

        <div class="content-main--right">
            <div class="content">
                <?= $this->section('content') ?>
            </div>

            <!-- start footer -->
            <footer class="footer">
                <?php $this->insert('dash/partials/footer') ?>
            </footer>
            <!-- end footer -->
        </div>
    </div>

    <!-- script js -->
    <script src="assets/js/dash.js"></script>
    <?= $this->section('js') ?>
</body>
</html>