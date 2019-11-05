<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET) == false) {
        $idProduct = ($_GET["add_to_cart"]);
        $cookieName = 'product['.$idProduct.']';
        $cookieValue = $idProduct;
        if (empty($_COOKIE[$cookieName])) {
            setcookie($cookieName, $cookieValue);
        }
    }
}
?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <?php if (!empty($_SESSION['name'])) { ?>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                        <?php } ?>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
