<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/tables.css" />
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Loja / Carrinho
        </p>
    </div>
</section>
<!-- end source -->

<!-- start settings -->
<section class="settings">
    <div class="settings--content tabl wrapper">
        <div class="settings--right">
            <div class="table--main">
                <table class="table">
                    <thead class="theadYellow">
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($instances['cart']->getCart()) > 0): ?>
                            <?php foreach($instances['cart']->getCart() as $product): ?>
                                <tr>
                                    <td>
                                        <div class="td--product">
                                            <div class="td--product__image">
                                                <img src="<?= $product->getImage() ?>" alt="product" />
                                            </div>
                                            <div class="td--product__name">
                                                <?= $product->getName() ?>
                                            </div>
                                        </div>  
                                    </td>
                                    <td>
                                        Kz <?= number_format($product->getPrice(), 2, ',', '.') ?>
                                    </td>
                                    <td>
                                        <input type="number" class="numberInput" min="1" date_add="<?= $product->getSlug() ?>" value="<?= $product->getQuantity() ?>" name="number" id="number" />
                                    </td>
                                    <td>
                                        Kz <?= number_format($instances['cart']->getProducSubTotal($product), 2, ',', '.') ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="/cart/remove/?product=<?= $product->getSlug() ?>">Remover</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <h3>Nenhum produto no carrinho adicione produtos para fazer a compra</h3>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cartsummery">
            <h3 class="cartsummery__title">Resumo do carrinho</h3>
            <div class="cartsummery--values">
                <p>
                    SubTotal <span>Kz <?= number_format($instances['cart']->getTotal(), 2, ',', '.') ?></span>
                </p>
                <p>
                    Entrega <span>Kz <?= number_format(1000, 2, ',', '.') ?></span>
                </p>
                <div class="cartsummery--total">
                    <p>
                        Total a pagar <span>Kz <?= number_format(($instances['cart']->getTotal() + 1000), 2, ',', '.') ?></span>
                    </p>

                    <a id="btn" href="#">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->