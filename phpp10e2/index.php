<?php
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$patternNumber = '#^[0-9]+$#';
$patternText = '#^[A-Z a-zÀ-ÖØ-öø-ÿ].+#';

$formErrors = array();

if (count($_POST) > 0) {

    if (!empty($_POST['title'])) {
        if ($_POST['title'] === 'Madame' || $_POST['title'] === 'Monsieur') {
            $title = $_POST['title'];
        } else {
            $formErrors['title'] = 'Votre civilité est incorrecte';
        }
    } else {
        $formErrors['title'] = 'Veuillez renseigner votre civilité';
    }

    if (!empty($_POST['lastName'])) {
        if (preg_Match($patternName, $_POST['lastName'])) {
            $lastName = htmlspecialchars($_POST['lastName']);
        } else {
            $formErrors['lastName'] = 'Votre nom est incorrect';
        }
    } else {
        $formErrors['lastName'] = 'Veuillez renseigner votre nom';
    }

    if (!empty($_POST['firstName'])) {
        if (preg_Match($patternName, $_POST['firstName'])) {
            $firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Votre prénom est incorrect';
        }
    } else {
        $formErrors['firstName'] = 'Veuillez renseigner votre prénom';
    }

    if (!empty($_POST['age'])) {
        if (preg_Match($patternNumber, $_POST['age'])) {
            $age = htmlspecialchars($_POST['age']);
        } else {
            $formErrors['age'] = 'Votre prénom est incorrect';
        }
    } else {
        $formErrors['age'] = 'Veuillez renseigner votre prénom';
    }

    if (!empty($_POST['society'])) {
        if (preg_Match($patternText, $_POST['society'])) {
            $society = htmlspecialchars($_POST['society']);
        } else {
            $formErrors['society'] = 'Votre prénom est incorrect';
        }
    } else {
        $formErrors['society'] = 'Veuillez renseigner votre prénom';
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Exercice TP</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
            <div class="background">
                <h1 class="center">Exercice TP 2</h1>
                <p class="center">Faire une page permettant de saisir les informations suivantes :</p>
                <ul class="center">
                    <li>Civilité (liste déroulante)</li>
                    <li>Nom</li>
                    <li>Prénom</li>
                    <li>Age</li>
                    <li>Société</li>
                </ul>
                <p class="center">A la validation, les données saisies devront aparaitre sous le formulaire.</p>
                <p class="center">Attention les données devront rester dans les différents éléments du formulaire même après la validation.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="offset-3 col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="title">Civilité</label>
                                <select class="form-control" id="title" name="title">
                                    <option selected disabled>---Choix---</option>
                                    <option value="Madame"  <?= isset($_POST['title']) && $_POST['title'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
                                    <option value="Monsieur"  <?= isset($_POST['title']) && $_POST['title'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
                                </select>
                                <?php if (isset($formErrors['title'])) {
                                    ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['title'] ?></p>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Nom</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" placeholder="Dupont" />
                                <?php
                                // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                                if (isset($formErrors['lastName'])) {
                                    ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['lastName'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Prénom</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" placeholder="Jean" />
                                <?php if (isset($formErrors['firstName'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['firstName'] ?></p>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" min="0" class="form-control" id="age" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>" name="age"/>
                                <?php
                                if (isset($formErrors['age'])) {
                                    ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['age'] ?></p>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="society">Société</label>
                                <input type="text" class="form-control" id="society" name="society" value="<?= isset($_POST['society']) ? $_POST['society'] : '' ?>" placeholder="FM logistic" />
                                <?php if (isset($formErrors['society'])) { ?>
                                    <div class="alert-danger">
                                        <p><?= $formErrors['society'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <?php if(count($_POST) > 0 && count($formErrors) == 0) { ?>
                <p>Votre civilité : <?= $title ?></p>
                <p>Votre nom : <?= $lastName ?></p>
                <p>Votre prénom : <?= $firstName ?></p>
                <p>Votre age : <?= $age ?></p>
                <p>Votre societé : <?= $society ?></p>
                <?php } ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
