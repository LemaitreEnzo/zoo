<?php

ob_start();

if (!empty($data['error']['global'])) { ?>
    <p style="color : red"><?= $data['error']['global'] ?></p>
<?php }
?>
    <div class="container">
        <div class="todo-container">

            <h1>Ajouter une Tâche</h1>
            <form class="todo-form" method="POST">
                <label for="task-name">Nom de la Tâche:</label>
                <input type="text" id="task-name" name="task-name" placeholder="Entrez le nom de la tâche" required>

                <label for="task-desc">Catégorie de la tâche:</label>
                <select name="category" id="category" class="form-select" required>
                    <?php
                    foreach ($data['categories'] as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>;
                    <?php endforeach ?>
                </select>

                <button class="add" type="submit" name="add_task">Ajouter</button>
            </form>
        </div>

        <div class="todo-container">

            <h1>Ajouter une Categorie</h1>
            <form class="todo-form" method="POST">
                <label for="category-name">Nom de la Categorie:</label>
                <input type="text" id="category-name" name="category-name" placeholder="Entrez le nom de la categorie" required>

                <button class="add" type="submit" name="add_category">Ajouter</button>
            </form>
        </div>
    </div>
    <div>
        <?php
        render('show', [
            'tasks' => $data['tasks'],
            'categories' => $data['categories']
        ], true);
        ?>
    </div>

<?php  
$content = ob_get_clean();


render(
    'default',
    [
        'content' => $content,
    ],
    true
);
