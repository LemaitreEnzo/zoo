<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f9;
    color: #333;
}

.error-container {
    text-align: center;
    max-width: 600px;
    padding: 2rem;
    border-radius: 8px;
}

.error-container h1 {
    font-size: 6rem;
    color: #ff6b6b;
}

.error-container h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.error-container p {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 2rem;
}

.home-button {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.home-button:hover {
    background-color: #45a049;
}

</style>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404 - Page Non Trouvée</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="error-container">
    <h1>404</h1>
    <p>Oups! La page que vous recherchez n'existe pas.</p>
    <a href="/" class="home-button">Retour à l'accueil</a>
</div>

</body>
</html>
