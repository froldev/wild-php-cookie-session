<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET) == false) {
        $idProduct = ($_GET["delete"]);
        $cookieName = 'product['.$idProduct.']';
        $cookieValue = '';
        if (empty($_COOKIE[$cookieName])) {
            setcookie($cookieName, $cookieValue, time() - 1000);
            setcookie($cookieName, $cookieValue, time()-1000, '/');
        }
        header('Location:/cart.php');
    }
}
?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">

        <?php if (isset($_COOKIE['product'])) { ?>
            <table class='table text-center'>
                <thead>
                <tr>
                    <th scope='col'>Référence(s)</th>
                    <th scope='col'>Produit(s)</th>
                    <th scope='col'>Quantité</th>
                    <th scope='col'>Supprimer</th>
                </tr>
                </thead>
                <?php
                foreach ($_COOKIE['product'] as $value) {
                    $value = htmlspecialchars($value);
                    foreach ($catalog as $id => $cookie) {
                        if ($id == $value) { ?>
                            <tbody>
                                <tr>
                                    <td scope='row'><?= $id; ?></td>
                                    <td><h3><?= $cookie['name']; ?></h3></td>
                                    <td><div class='input-group'>
                                        <select class='custom-select'>
                                            <option value='1'>1</option>";
                                                <?php for($i=2; $i < 10; $i++){ ?>
                                                <option value=<?= $i; ?>><?= $i; ?></option>
                                                <?php } ?>
                                        </select>
                                        </div>
                                    </td>
                                    <td><a class="btn btn-primary" href="?delete=<?= $id; ?>" role="button">Supprimer</td>
                                </tr>
                            </tbody>
                        <?php }
                        }
                    } ?>
            </table>
        <?php } else { ?>
            <div class='text-center'><p>il n'y a pas de produits au panier</p></div>
        <?php } ?>
        <a class='btn btn-primary' href='/' role='button'>
            Retour
        </a>

    </div>
</section>
<?php require 'inc/foot.php'; ?>

