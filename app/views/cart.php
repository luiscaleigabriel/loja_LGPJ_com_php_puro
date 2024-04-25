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
                        <tr>
                            <td>
                                <div class="td--product">
                                    <div class="td--product__image">
                                        <img src="images/product-1.jpg" alt="product" />
                                    </div>
                                    <div class="td--product__name">
                                        Nome do produto
                                    </div>
                                </div>
                            </td>
                            <td>
                                Kz 5000
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                Kz 5000
                            </td>
                            <td>
                                <a class="btn btn-danger" href="#">Remover</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cartsummery">
            <h3 class="cartsummery__title">Resumo do carrinho</h3>
            <div class="cartsummery--values">
                <p>
                    SubTotal <span>Kz 1000</span>
                </p>
                <p>
                    Entrega <span>Kz 1000</span>
                </p>
                <div class="cartsummery--total">
                    <p>
                        Entrega <span>Kz 2000</span>
                    </p>

                    <a id="btn" href="#">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->