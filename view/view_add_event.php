<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Create article</title>
</head>
<body>
    <h3>Ajouter un un évenement</h3>
    <form action="" method="post">
        <p>Nom de l'évenement :</p>
        <p><input type="text" name="nom_event"></p>
        <p>Date de l'évenement :</p>
        <p><input type="date" name="date_event"></p>
        <p>
            <label for="liste_type">Sélectionner un type :</label>
            <select name="type" id="liste_type">
                <option value="default">----- TYPES -----</option>
            </select>
        </p>
        <p>Description de l'évenement :</p>
        <p><textarea name="desc_event" cols="50" rows="10"></textarea></p> 
        <p><input type="submit" value="Ajouter" name="create"></p>
    </form>
    <div id="message"></div>
    <script src="./asset/js/script.js"></script>
</body>
</html>