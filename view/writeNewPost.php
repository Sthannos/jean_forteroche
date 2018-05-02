<?php
$title = 'Nouvel épisode';
ob_start();
?>
<h2>Rédiger un nouvel épisode</h2>
<form action="index.php?action=addPost" method="post">
    <label for="title">Titre : <input id="title" name="title" type="text" required></label>
    <label for="content">Épisode : <textarea id="content" name="content" required></textarea></label>
    <div>
        <p>Publier ?</p>
        <label for="publish"><input id="publish" name="published" type="radio" value="1">Oui</label>
        <label for="noPublish"><input id="noPublish" name="published" type="radio" value="0" checked>Non</label>
    </div>
    <input id="send" type="submit"  value="Créer un nouvel épisode">
</form>


<?php
$content = ob_get_clean();
require('template/template.php');