<script src="ressources/search.js"></script>
<input class="form-control" id="searchBar" type="text" placeholder="Recherche" onkeyup="searchOrder()">
<div id="ulOrders">
    <?php
        $i = 0;
        foreach ($orders as $order) {

            echo '<div class="accordion" id="orders">
        <div>
          <div class="card-header" id="heading'.$i.'">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">n°'
              .$order['id'].' '.Order::getStatus($order['idStatus'])['name'].'
              </button>';
              if($order['idStatus'] == 2)
                echo '<a href="?section=orders&action=paidOrder&id='.$order['id'].'"><button type="button" class="btn btn-outline-success float-right" Onclick="return confirm(\'Etes-vous sûr ?\')">Paiement reçu</button></a>';
            echo '</h2>
        </div>
        <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#orders">
        <div class="card-body">
        Client n°'.$order['idUser'].'<br>
        Commande effectuée le: '.$order['date'].'<br>
        Total: '.$order['total'].'€<br>
        Adresse de livraison: '.$order['adress'].'<br>';
        if(isset($order['transactionId']))
          echo 'Référence de la transaction: '.$order['transactionId'];
        echo '</div></div></div></div>';
        $i++;
        }
    ?>
</div>