<?php
$animal_id = null;

// Check if the POST request contains a valid 'id' and sanitize it
if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $animal_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
}

$animal = new Models\Animal();
$animal->setId($animal_id);

// Delete the animal from the database
$animal->delete();

// Redirect to the homepage
redirectTo('/');
exit();
