<?php
ob_start();
?>

<main>
    <a href="/"><ion-icon id="home" name="home-outline"></ion-icon></a>
    <div class="header">
        <h1>Bienvenue dans l'enclos des <?= $data['enclosure'][0]['name'] ?></h1>
        <div class="modify-container">
            <a class="modify" type="button" href="/modify-enclosure?id=<?= $data['enclosure'][0]['id'] ?>"><ion-icon name="pencil-outline"></ion-icon></a>
        </div>
        <div class="delete-container">
            <form id="form-<?= $data['enclosure'][0]['id'] ?>-Enclosure" action="/delete-enclosure" method="POST">
                <input type="hidden" name="id" value="<?= $data['enclosure'][0]['id'] ?>">
                <button class="delete" type="button" data-bs-toggle="modal" onclick="openModal('Enclosure', <?= $data['enclosure'][0]['id'] ?>)"><ion-icon name="trash-outline"></ion-icon></button>
            </form>
        </div>
    </div>
    <p id="description" style="margin-left: 35%; margin-right: 35%;">
        <?= $data['enclosure'][0]['description'] ?>
    </p>
    <ul>
        <li>
            <div id="show'animal">
                <?php foreach ($data['animals'] as $animal): ?>
                    <div class="show-animal-container">
                        <div>
                            <p><?= $animal['name'] ?></p><br>
                            <p class="animal-description"><?= $animal['description'] ?></p>
                        </div>
                        <div class="footer-card">
                            <div class="modify-container">
                                <a class="modify" type="button" href="/modify-animal?id=<?= $animal['id'] ?>"><ion-icon name="pencil-outline"></ion-icon></a>
                            </div>
                            <div class="delete-container">
                                <form id="form-<?= $animal['id'] ?>-Animal" action="/delete-animal" method="POST">
                                    <input type="hidden" name="id" value="<?= $animal['id'] ?>">
                                    <button class="delete" type="button" data-bs-toggle="modal" onclick="openModal('Animal', <?= $animal['id'] ?>)"><ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
    </ul>
</main>

<div id="modalAnimal" class="modal" style="display: none;">
    <div class="modal-content">
        <p>Êtes-vous sûr de vouloir supprimer?</p>
        <button class="confirmDeleteAnimal">Confirmer</button>
        <button class="cancel" onclick="closeModal('Animal')">Annuler</button>
    </div>
</div>

<div id="modalEnclosure" class="modal" style="display: none;">
    <div class="modal-content">
        <p>Êtes-vous sûr de vouloir supprimer?</p>
        <button class="confirmDeleteEnclosure">Confirmer</button>
        <button class="cancel" onclick="closeModal('Enclosure')">Annuler</button>
    </div>
</div>

<?php

$content = ob_get_clean();


// Renders the 'show' view with the provided content, CSS, and JS.
render('show', [
    'content' => $content,
    'animals' => $data['animals'],
    'enclosure' => $data['enclosure'],
    'css' => [
        'show'
    ],
    'js' => [
        'script'
    ]
], true);
