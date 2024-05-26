<?= $this->layout('master') ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Loja
        </p>
    </div>
</section>
<!-- end source -->

<!-- start shop -->
<section class="shop">
    <div class="shop--content wrapper">
        <div class="shop--left">
            <div class="shop--left-c">
                <h1 class="shop__title">
                    Categorias
                </h1>
                <div class="droplist">
                    <?php foreach($instances['categories']::all() as $category): ?>
                        <div class="droplist--item">
                            <button class="droplist__btn"><?= $category->name ?></button>
                            <ul class="droplist--list">
                                <?php foreach($instances['subCategories']::all() as $subCategory): ?>
                                    <?php if($subCategory->idcategory === $category->id): ?>
                                        <li class="droplist--list__item">
                                            <a href="/shop?subcategory=<?= $subCategory->id ?>"><?= $subCategory->name ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="shop--right">
            <div class="products--content">
                <?php if(isset($_GET['category'])): ?>
                    <?php if(count($products) > 0): ?>
                        <?php foreach($products as $product): ?>
                            <div class="products--product">
                                <div class="products--product__image">
                                    <img src="<?= $product->image ?>" alt="product" />
                                </div>
                                <a class="products--product__name" href="/details?id=<?= $product->id ?>"><?= $product->name ?></a>
                                <p class="products--product__price">
                                    <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?></span> 
                                </p>
                                <a class="products--product__add" href="/cart/add/?id=<?= $product->id ?>">Add no carrinho - <?= $instances['cart']->getQuantity($product) ?></a>
                                <a class="products--product__details" href="/details?id=<?= $product->id ?>">Detalhes</i></a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h2>Nenhum produto encontrado</h2>
                    <?php endif; ?>
                <?php elseif(isset($_GET['subcategory'])): ?>
                    <?php if(count($products) > 0): ?>
                        <?php foreach($products as $product): ?>
                            <div class="products--product">
                                <div class="products--product__image">
                                    <img src="<?= $product->image ?>" alt="product" />
                                </div>
                                <a class="products--product__name" href="/details?id=<?= $product->id ?>"><?= $product->name ?></a>
                                <p class="products--product__price">
                                    <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?></span> 
                                </p>
                                <a class="products--product__add" href="/cart/add/?id=<?= $product->id ?>">Add no carrinho - <?= $instances['cart']->getQuantity($product) ?></a>
                                <a class="products--product__details" href="/details?id=<?= $product->id ?>">Detalhes</i></a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h2>Nenhum produto encontrado</h2>
                    <?php endif; ?>
                <?php elseif(!isset($_GET['category']) && !isset($_GET['subcategory'])): ?>
                    <?php if(count($products) > 0): ?>
                        <?php foreach($products as $product): ?>
                            <div class="products--product">
                                <div class="products--product__image">
                                    <img src="<?= $product->image ?>" alt="product" />
                                </div>
                                <a class="products--product__name" href="/details?id=<?= $product->id ?>"><?= $product->name ?></a>
                                <p class="products--product__price">
                                    <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?></span> 
                                </p>
                                <a class="products--product__add" href="/cart/add/?id=<?= $product->id ?>">Add no carrinho - <?= $instances['cart']->getQuantity($product) ?></a>
                                <a class="products--product__details" href="/details?id=<?= $product->id ?>">Detalhes</i></a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h2>Nenhum produto encontrado</h2>
                    <?php endif; ?>
                <?php else: ?>
                    <h2>Nenhum produto encontrado</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- end shop -->