<?php

ob_start();
?>

<div class="container">
    <div class="animal-container">

        <h2>Ajouter un Animal</h2>
        <form class="animal-form" method="POST" action="/">
            <label for="animal-name">Nom de l'animal:</label>
            <input type="text" id="animal-name" name="animal-name" placeholder="Entrez le nom de l'animal" required>

            <label for="animal-description">Description de l'animal:</label>
            <textarea name="animal-description" id="animal-description" require></textarea>

            <label for="animal-specie">Espèce de l'animal:</label>
            <input type="text" id="animal-specie" name="animal-specie" placeholder="Entrez le nom de l'espèce" required>

            <label for="animal-enclosure">Enclos de l'animal:</label>
            <select name="enclosure" id="enclosure" class="form-select" required>
                <?php
                foreach ($data['enclosure'] as $enclosure): ?>
                    <option value="<?= $enclosure['id'] ?>"><?= $enclosure['name'] ?></option>;
                <?php endforeach ?>
            </select>

            <button class="add" type="submit" name="add_animal">Ajouter</button>
        </form>
    </div>

    <div class="animal-container">

        <h2>Ajouter un Enclos</h2>
        <form class="animal-form" method="POST" action="/">
            <label for="enclosure-name">Nom de l'enclos:</label>
            <input type="text" id="enclosure-name" name="enclosure-name" placeholder="Entrez le nom de l'enclos" required>
            <label for="enclosure-description">Description de l'enclos:</label>
            <textarea name="enclosure-description" id="enclosure-description" require></textarea>

            <button class="add" type="submit" name="add_enclosure">Ajouter</button>
        </form>
    </div>
</div>
<style>
    .show-enclosure-form button {
        width: 100%;
        margin-top: 10%;
        background-color: #2e7d32;
        color: white;
        padding: 0.8rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .show-enclosure-form button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .enclosure {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        flex: 1;
        min-width: 350px;
        max-width: 450px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .show-enclosure-form select {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f4f4f9;
        transition: border 0.3s ease;
    }

    .show-enclosure-form label {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
</style>
<div class="enclosure">
    <form class="show-enclosure-form" action="/show-enclosure?id=<?= $enclosure['id'] ?>" method="POST">
        <label for="show-enclosure">Afficher l'enclos:</label>
        <select name="show-enclosure" id="enclosure">
            <?php
            foreach ($data['enclosure'] as $enclosure): ?>
                <option value="<?= $enclosure['id'] ?>"><?= $enclosure['name'] ?></option>;
            <?php endforeach ?>
        </select>
        <button type="submit" class="show" name="show">Afficher</button>
    </form>
</div>


<?php

$content = ob_get_clean();

render(
    'default',
    [
        'content' => $content,
        'css' => [
            'style',
        ],
    ],
    true
);
