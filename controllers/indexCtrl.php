<?php 

$enclosure = new Models\Enclosure();
$animal = new Models\Animal();


$animals = [];
$enclosureList = [];

if (!empty($_POST) && isset($_POST['add_enclosure'])) {
    $enclosure->setName($_POST['enclosure-name']);
    $enclosure->setDescription($_POST['enclosure-description']);
    $enclosure->addEnclosure();
    redirectTo('/');
    exit();
}

if (!empty($_POST) && isset($_POST['add_animal'])) {
    $animal->setName($_POST['animal-name']);
    $animal->setDescription($_POST['animal-description']);
    $animal->setSpecie($_POST['animal-specie']);
    $animal->setEnclosureId($_POST['enclosure']);
    $animal->addAnimal();
    redirectTo('/');
    exit();
}


$enclosureList = $enclosure -> get();

render('index', [
    'enclosure' => $enclosureList,
]);