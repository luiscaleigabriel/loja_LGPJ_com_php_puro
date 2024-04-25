<?= $this->layout('master') ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Carrinho / Produtos
        </p>
    </div>
</section>
<!-- end source -->

<!-- start settings -->
<section class="settings">
    <div class="settings--content wrapper">
        <div class="settings--painel">
            <a href="/cart/orders" class="settings--painel__option">
                Fazer a compra
            </a>
        </div>
        <div class="settings--right">
            <div class="cartlis--content">
                <h3 class="cartlis__title">Meus produtos</h3>
                <div class="cartlis--content__products">
                    <?php foreach($instances['cart']->getCart() as $product): ?>
                        <div class="cartlis--product">
                            <div class="cartlis--product__image">
                                <img src="<?= $product->getImage() ?>" alt="product" />
                            </div>
                            <div class="cartlis--product__info">
                                <span class="cartlis--product__name"><?= $product->getName() ?></span>
                                <span class="cartlis--product__price">Kz <?= number_format($product->getPrice(), 2, ',', '.') ?></span>
                                <span class="cartlis--product__price">Quantidade <input value="<?= $product->getQuantity() ?>" type="number" name="quantity" id="quantity" /></span>
                            </div>
                            <div class="cartlis--product__action">
                                <a href="/cart/delete/?id=<?= $product->getId() ?>" class="btn btn-danger">Deletar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->