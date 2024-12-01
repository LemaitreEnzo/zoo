<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!empty($data['css'])) {
        foreach ($data['css'] as $filename) { ?>
            <link rel="stylesheet" href="assets/css/<?= $filename ?>.css">
    <?php }
    } ?>
    <?php if (!empty($data['js'])) {
        foreach ($data['js'] as $filename) { ?>
            <script src="assets/js/<?= $filename ?>.js"></script>
    <?php }
    } ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Zoo</title>
</head>
