<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/tables.css" />
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Minha Conta</span> / Definições
        </p>
    </div>
</section>
<!-- end source -->

<!-- start settings -->
<section class="settings">
    <div class="settings--content tabl wrapper">
    <?php $this->insert('partials/settingpainel') ?>
        <div class="settings--right">
            <div class="table--main">
                <h3 class="table--main__title">Minhas Compras</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Compras#</th>
                            <th>Data da compra</th>
                            <th>Estado</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>OR756374</td>
                            <td>11 Nov 2021</td>
                            <td> <span class="status">Delivered</span></td>
                            <td>KZ3000</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->

