<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter client dolibarr</h1>
    <form action="<?= BASE_URL ?>/ajouterClient" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" required>
        <label for="capital">Capital</label>
        <input type="number" name="capital" id="capital" required>
        <button type="submit">Valider</button>
    </form>
</body> 
</html>