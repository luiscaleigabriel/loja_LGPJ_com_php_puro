<?= $this->layout('master') ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / <span class="source--content__color">Loja</span> / <?= $product->name ?>
        </p>
    </div>
</section>
<!-- end source -->

<!-- start product-description --> 
<section class="product-description">
    <div class="product-description--content wrapper">
        <div class="product-description--top">
            <div class="product-description__image">
                <img src="<?= $product->image ?>" alt="product" />
            </div>
            <div class="product-description__description">
                <h3 class="product-description__name"><?= $product->name ?></h3>
                <span class="product-description__views">(99 visualizações)</span>
                <span class="priceBefore">Kz <?= number_format(($product->price + 2000), 2, ',', '.') ?></span>
                <span class="priceNow">Kz <?= number_format($product->price, 2, ',', '.') ?></span>
                <p>
                    <?= $product->description ?>
                </p>
                <a href="/cart/add/?id=<?= $product->id ?>" class="btn btn-primary">Adicionar no carrinho</a>
            </div>
        </div>
        <div class="product-description--bottom">
            <div class="product-description--bottom__btns">
                <div id="one" class="btn_desc">Descrição</div>
                <div id="two" class="btn_desc">Shipping & Returns</div>
                <div id="three" class="btn_desc">Revisões</div>
            </div>
            <div class="product-description--bottom__content">
                <div class="one"><?= $product->description ?></div>
                <div class="two">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem.</div>
                <div class="three"></div>
            </div>
        </div>
    </div>
</section>
<!-- start product-description --> 

<!-- start products --> 
<section class="products">
    <div class="products--content wrapper">
        <h1 class="products__title">
            Produtos relacionados
        </h1>
        <?php foreach($allProducts as $productR): ?>
            <?php if($productR->idsubcategory == $product->idsubcategory): ?>
                <div class="products--product">
                    <div class="products--product__image">
                        <img src="<?= $product->image ?>" alt="product" />
                    </div>
                    <a class="products--product__name" href="/details?id=<?= $product->id ?>"><?= $product->name ?></a>
                    <p class="products--product__price">
                        <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?> </span>
                    </p>
                    <a class="products--product__add" href="/cart/add/?id=<?= $product->id ?>">Add no carrinho - <?= $instances['cart']->getQuantity($product) ?></a>
                    <a class="products--product__details" href="/details?id=<?= $product->id ?>">Detalhes</i></a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<!-- end products --> 