<?php
ob_start();
?>
<main>
    <div class="container">
        <div class="animal-container">
            <a href="/"><ion-icon id="home" name="home-outline"></ion-icon></a>

            <?php
            // Check if the modification is for an animal
            if ($data['modify'] == 'animal') { ?>
                <h2>Modifier l'animal <?= $data['animal'][0]['name'] ?></h2>
                <form class="animal-form" method="POST" action="/modify-animal?id=<?= $data['animal'][0]['id'] ?>">
                    <label for="animal-name">Nom de l'animal:</label>
                    <input type="text" id="animal-name" name="animal-name" placeholder="Entrez le nom de l'animal" value="<?= $data['animal'][0]['name'] ?>" required>

                    <label for="animal-description">Description de l'animal:</label>
                    <textarea name="animal-description" id="animal-description" require><?= $data['animal'][0]['description'] ?></textarea>

                    <label for="animal-specie">Espèce de l'animal:</label>
                    <input type="text" id="animal-specie" name="animal-specie" placeholder="Entrez le nom de l'espèce" value="<?= $data['animal'][0]['specie'] ?>" required>

                    <label for="animal-enclosure">Enclos de l'animal:</label>
                    <select name="enclosure" id="enclosure" class="form-select" required>
                        <option value="<?= $data['enclosure'][0]['id'] ?>"><?= $data['enclosure'][0]['name'] ?></option>
                        <?php
                        // Loop through the list of enclosures and create options
                        foreach ($data['enclosureList'] as $enclosure): ?>
                            <option value="<?= $enclosure['id'] ?>"><?= $enclosure['name'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <button class="add" type="submit" name="modify-animal">Modifier</button>
                </form>
        </div>
    </div>
<?php
            } else { ?>
    <div class="container">
        <div class="enclosure-container">

            <h2>Modifier l'enclos des <?= $data['enclosure'][0]['name'] ?></h2>
            <form class="enclosure-form" method="POST" action="/modify-enclosure?id=<?= $data['enclosure'][0]['id'] ?>">
                <label for="enclosure-name">Nom de l'animal:</label>
                <input type="text" id="enclosure-name" name="enclosure-name" placeholder="Entrez le nom de l'enclosure" value="<?= $data['enclosure'][0]['name'] ?>" required>

                <label for="enclosure-description">Description de l'enclos:</label>
                <textarea name="enclosure-description" id="enclosure-description" require><?= $data['enclosure'][0]['description'] ?></textarea>

                <button class="add" type="submit" name="modify-enclosure">Modifier</button>
            </form>
        </div>
    </div>

<?php } ?>
</main>
<?php

$content = ob_get_clean();

// Renders the modify view with the provided content and CSS.
render('modify', [
    'content' => $content,
    'css' => [
        'modify',
    ]
], true);
