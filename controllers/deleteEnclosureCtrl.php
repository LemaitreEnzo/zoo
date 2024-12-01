<?php
$enclosure_id = null;

// Check if the POST request contains a valid 'id' and sanitize it
if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $enclosure_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
}

$enclosure = new Models\Enclosure();
$enclosure->setId($enclosure_id);

try {
    // Count the number of animals in the enclosure
    $count = $enclosure->countAnimals();
} catch (Exception $e) {
    // Handle any exceptions
    echo "Erreur : " . $e->getMessage();
}

// Check if the enclosure is empty
if ($count == 0) {
    $enclosure->delete();
    redirectTo('/');
    exit();
} else {
    // Throw an exception if the enclosure is not empty
    throw new Exception('The enclosure must be empty.');
}
