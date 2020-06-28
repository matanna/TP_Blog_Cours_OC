<?= $title='Ajouter un article' ?>

<?php ob_start(); ?>

<h1>Ajouter un article : </h1>

    <form method='post' action='index.php?action=addNewPost'>
        <p>
            <label for='title'>Titre :</label>
            <input type='text' id='title' name='title' />
        </p>
        <p>
            <label for='content'>Votre commentaire :</label>
            <textarea id='content' name='content' rows='10' cols='45'></textarea>
        </p>
        <p>
            <input type='submit' value='Envoyer' />
        </p>

    </form>  

<?php $content = ob_get_clean() ?>

<?php require('view/frontend_view/template.php'); ?>