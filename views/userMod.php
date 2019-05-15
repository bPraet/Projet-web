<?php
    $title = "Profile";
    require 'views/header.php';
?>

<div class="modifyForm">
    <form action="userMod?login=<?php echo $_SESSION['login']; ?>" method="post" class="d-flex flex-column" required>
      Login<input type="text" name="login" value=<?php echo '"'.$user->get('login').'"'?> required>
      Password<input type="password" name="password">
      Name<input type="text" name="name" value=<?php echo '"'.$user->get('name').'"'?> required>
      Firstname<input type="text" name="firstname" value=<?php echo '"'.$user->get('firstname').'"'?> required>
      Email<input type="email" name="email" value=<?php echo '"'.$user->get('email').'"'?> required>
      <input type="submit" name="submit" value="Valider">
    </form>
 </div>
 <br><h2>Mes commandes</h2>
 <?php
     $i = 0;
     foreach ($orders as $order) {

      echo '<div class="accordion" id="orders">
     <div>
       <div class="card-header" id="heading'.$i.'">
         <h2 class="mb-0">
           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">n°'
           .$order['id'].' '.Order::getStatus($order['idStatus'])['name'];
           if(Order::getStatus($order['idStatus'])['name'] == 'en attente')
            echo '<a href="order?id='.$order['id'].'"><button type="button" class="btn btn-outline-success float-right">Payer la commande</button></a>';
           echo '</button>
          </h2>
     </div>
     <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#orders">
     <div class="card-body">
     Commande effectuée le: '.$order['date'].'<br>
     Total: '.$order['total'].'€<br>
     Adresse de livraison: '.$order['adress'].'<br>';
     if(isset($order['transactionId']))
       echo 'Référence de la transaction: '.$order['transactionId'];
     echo '</div></div></div></div>';
     $i++;
     }

    include 'views/footer.php';
 ?>