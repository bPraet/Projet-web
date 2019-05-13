<div class="modifyForm">
    <form action="adminUserMod?login=<?php echo $user->get('login'); ?>" method="post" class="d-flex flex-column" required>
      Login<input type="text" name="login" value=<?php echo '"'.$user->get('login').'"'?> required>
      Name<input type="text" name="name" value=<?php echo '"'.$user->get('name').'"'?> required>
      Firstname<input type="text" name="firstname" value=<?php echo '"'.$user->get('firstname').'"'?> required>
      Email<input type="email" name="email" value=<?php echo '"'.$user->get('email').'"'?> required>
      <input type="submit" name="submit" value="Valider">
    </form>
 </div>