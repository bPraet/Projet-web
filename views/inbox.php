<?php
    $title = 'Inbox';
    include 'views/header.php';
?>
<h1><?php echo $title ?></h1>


<?php
    $i = 1;
    foreach ($inbox as $message) {
        echo '<div class="accordion" id="inbox">
        <div>
          <div class="card-header" id="heading'.$i.'">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">'
              .$message['name'].' '.$message['firstname'].'
              </button>
              <a href="mailto:'.$message['email'].'"><button type="button" class="btn btn-outline-success float-right">Répondre</button></a>
              <a href="?action=rm&id='.$message['id'].'"><button type="button" class="btn btn-outline-danger float-right" Onclick="return confirm(\'Etes-vous sûr ?\')">Supprimer</button></a>
            </h2>
        </div>
        <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#inbox">
        <div class="card-body">'
        .nl2br($message['message']).'
        </div></div></div></div>';
        $i++;
    }
?>

<?php
    include 'views/footer.php';
?>