<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

   <h2>Oups !!!</h2>

   <p><?= $errorMessage ?></p>
   

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend_view/template.php'); ?>