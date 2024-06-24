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

<?php if($instances['session']::has('__flash')): ?>
    <?php if($instances['session']::flashHas('success')):  ?>
        <div class="success">
            <?= $instances['session']::flashGet('success') ?>
        </div>
    <?php endif; ?>
    <?php if($instances['session']::flashHas('error')): ?>
        <div class="error">
            <?= $instances['session']::flashGet('error') ?>
        </div>
    <?php endif;  ?>
<?php endif; ?>

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
                        <?php foreach($orders as $order):?>
                            <?php if($order->iduser == $instances['session']::get('user')['id']): ?>
                                <tr>
                                    <td>OR<?= $order->id ?></td>
                                    <td><?= $order->orderdate ?></td>
                                    <td> <span class="status">Comprado</span></td>
                                    <td>Kz <?= number_format($order->total, 2, ',', '.') ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="table--button">
        <?= $pagination->links() ?>
    </div>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->

