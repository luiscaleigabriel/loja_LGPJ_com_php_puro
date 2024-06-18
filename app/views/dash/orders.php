<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<h2 class="dash__title">Compras</h2>

<div class="table--group">
    <div class="table--top">
        <div class="search--form">
            <form class="form--search" action="">
                <input type="search" name="search" id="search" placeholder="Buscar por..." /> <button><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Fulano de tal</td>
                    <td>fulano@gmail.com</td>
                    <td>999999</td>
                    <td>
                        <div class="stautus">
                            Vendido
                        </div>
                    </td>
                    <td>Kz 200.000,00</td>
                </tr>
            </tbody>
    </table>
    <div class="table--button">
        <?= $pagination->links() ?>
    </div>
</div>