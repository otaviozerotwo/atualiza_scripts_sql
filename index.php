<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtualizaBD</title>
</head>
<body>
    <form action="processamento.php" method="POST" enctype="multipart/form-data">
        <label for="scripts_folder">Escolha a pasta:</label>
        <input type="file" name="scripts_folder[]" id="scripts_folder" directory webkitdirectory multiple>
        <br>
        <input type="submit" name="action" value="Enviar">
    </form>
</body>
</html>