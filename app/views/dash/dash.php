<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<h2 class="dash__title">Dashboard</h2>

<section class="cards">
    <div class="card">
        <div class="card__value">150</div>
        <div class="card__orders">Total de compras</div>
        <a href="#">Mais info</a>
    </div>

    <div class="card">
        <div class="card__value">50</div>
        <div class="card__orders">Total de clientes</div>
        <a href="#">Mais info</a>
    </div>

    <div class="card">
        <div class="card__value">Kz 500 0000</div>
        <div class="card__orders">Total de vendas</div>
        <a href="#"></a>
    </div>
</section>
