<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<h2 class="dash__title">Dashboard</h2>

<section class="cards">
    <div class="card">
        <div class="card__value"><?= count($oders) ?></div>
        <div class="card__orders">Total de compras</div>
        <a href="#">Mais info</a>
    </div>

    <div class="card">
        <div class="card__value"><?= $totalUsers ?></div>
        <div class="card__orders">Total de clientes</div>
        <a href="#">Mais info</a>
    </div>

    <div class="card">
        <?php $total = 0; 
        foreach($oders as $oder): ?>
            <?php $total += $oder->total ?>
        <?php endforeach; ?>
        <div class="card__value">Kz <?= number_format($total, 2, ',', '.') ?></div>
        <div class="card__orders">Total de vendas</div>
        <a href="#"></a>
    </div>
</section>
