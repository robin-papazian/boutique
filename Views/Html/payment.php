<p>Paiment</p>

<?php
if (isset($_POST['prix']) && !empty($_POST['prix'])) {
    require_once('vendor/autoload.php');
    $prix = (float)$_POST['prix'];

    // on instancie stripe
    \Stripe\Stripe::setApiKey('sk_test_51IaMu4HqeeBCX3z4YAUHHNovpqFViqsD26sDLX64IzE2cmiAUJGanG2Sb5N807sOBjTGgbNUMLxNdeMLNfu4hqcZ00ChrxHDzB');

    $intent = \Stripe\PaymentIntent::create([
        'amount' => $prix * 100,
        'currency' => 'eur'
    ]);
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    echo '<pre>';
    var_dump($_SESSION['panier']);
    echo '</pre>';
    echo '<pre>';
    var_dump($_SESSION['order']);
    echo '</pre>';
} else {
    header('Location: index.php');
}


?>
<script src="https://js.stripe.com/v3/"></script>
<script src="js/scripts_paiement.js"></script>

<form method="POST">
    <div id="errors"></div>
    <input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
    <div id="cards-elements"></div>
    <div id="cards-errors" role="alert"></div>
    <button name='button' id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Procéder au paiment</button>
</form>



