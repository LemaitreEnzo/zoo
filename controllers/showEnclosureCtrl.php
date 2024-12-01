<?php

$animal = new Models\Animal();
$enclosure = new Models\Enclosure();

try {
    // Check if the form has been submitted and the 'show' button is set
    if (!empty($_POST) && isset($_POST['show'])) {
        // Set the enclosure ID for the animal and enclosure objects
        $animal->setEnclosureId($_POST['show-enclosure']);
        $enclosure->setId($_POST['show-enclosure']);
    }
} catch (Exception $e) {
    // Handle any exceptions
    throw $e;
}

// Retrieve the animals in the specified enclosure
$enclosureData = $animal->getByEnclosure();

// Render the 'show' view with the retrieved data
render('show', [
    'animals' => $enclosureData,
    'enclosure' => $enclosure->getById(),
]);
