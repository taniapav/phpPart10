
<?php
$portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
$portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
$portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
$portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');

function showPortrait($tableau) {
    ?>
    <div class="card col-3" style="width: 18rem;">
        <img src="<?= $tableau['portrait'] ?>" class="card-img-top" alt="Portrait de <?= $tableau['firstname'] . ' ' . $tableau['name'] ?>" />
        <div class="card-body">
            <p class="card-text"><?= $tableau['name'] . ' ' . $tableau['firstname'] ?></p>
        </div>
    </div>
    <p></p>
    <p></p>
    <?php
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <title>PHP PARTIE 10 TP 3</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                showPortrait($portrait1);
                showPortrait($portrait2);
                showPortrait($portrait3);
                showPortrait($portrait4);
                ?>
            </div>
        </div>
    </body>
</html>
