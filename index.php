<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtualizaBD</title>
</head>
<body>
    <form action="conexao.php" method="POST" enctype="multipart/form-data">
        <label for="sql_folder">Escolha a pasta:</label>
        <input type="file" name="sql_folder" id="sql_folder" directory webkitdirectory>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>