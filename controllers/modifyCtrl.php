<?php
$enclosure = new Models\Enclosure();
$enclosureList = $enclosure->get();

/**
 * Handles the modification of an animal or enclosure based on the REDIRECT_URL.
 */
if ($_SERVER['REDIRECT_URL'] == '/modify-animal') {
    $animal = new Models\Animal();
    if (!empty($_POST) && isset($_POST['modify-animal'])) {
        // Set animal properties from POST data
        $animal->setId($_GET['id']);
        $animal->setName($_POST['animal-name']);
        $animal->setDescription($_POST['animal-description']);
        $animal->setSpecie($_POST['animal-specie']);
        $animal->setEnclosureId($_POST['enclosure']);
        $enclosureId = $animal->setEnclosureId($_POST['enclosure']);
        // Modify the animal in the database
        $animal->modify();
        // Redirect to the homepage
        redirectTo('/');
        exit();
    } else {
        try {
            // Get animal data by ID
            $animal->setId($_GET['id']);
            $animalData = $animal->getById();
            $animal->setEnclosureId($animalData[0]['id_enclosure']);
            $enclosure->setId($animal->getIdEnclos());
            // Render the modify view with animal and enclosure data
            render('modify', [
                'animal' => $animalData,
                'enclosure' => $enclosure->getById(),
                'enclosureList' => $enclosureList,
                'modify' => 'animal',
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
} else {
    if (!empty($_POST) && isset($_POST['modify-enclosure'])) {
        // Set enclosure properties from POST data
        $enclosure->setId($_GET['id']);
        $enclosure->setName($_POST['enclosure-name']);
        $enclosure->setDescription($_POST['enclosure-description']);
        // Modify the enclosure in the database
        $enclosure->modify();
        // Redirect to the homepage
        redirectTo('/');
        exit();
    } else {
        try {
            // Get enclosure data by ID
            $enclosure->setId($_GET['id']);
            // Render the modify view with enclosure data
            render('modify', [
                'enclosure' => $enclosure->getById(),
                'enclosureList' => $enclosureList,
                'modify' => 'enclosure'
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
