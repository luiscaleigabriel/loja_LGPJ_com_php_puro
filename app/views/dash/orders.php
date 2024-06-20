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
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td><?= $order->id ?></td>
                        <?php foreach($users as $user): ?>
                            <?php if($user->id === $order->iduser): ?>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->phone ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td>
                            <div class="stautus">
                                Vendido
                            </div>
                        </td>
                        <td><?= number_format($order->total, 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <div class="table--button">
        <?= $pagination->links() ?>
    </div>
</div>