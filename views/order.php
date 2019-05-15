<?php
    $title = 'Commande';
    include 'views/header.php';
?>
<h1><?php echo $title ?></h1>
<div id="payContainer">
    Montant total: <?php echo($total)[0] ?>€<br>
    L'envoi de votre commande se fera dès que nous aurons reçu le paiment.<br>

    <div id="paypal-button-container"></div>
</div>
<script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
                value: <?php echo "'".$total[0]."'" ?>
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            <?php $_SESSION['orderValid'] = true; ?>
            window.location.href = <?php echo "'orderComplete?id=".$id?>&ref='+details.purchase_units[0].payments.captures[0].id;
        });
      }
    }).render('#paypal-button-container');
  </script>

<?php
    include 'views/footer.php';
?>