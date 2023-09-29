<?php
    $db_host = 'localhost';
    $db_name = 'teste';
    $db_user = 'postgres';
    $db_pass = '1234';

    try {
        $con = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão com o banco de dados estabelecida <br>";

        $folder = "scripts";
        
        $sql_files = glob($folder . '/*.sql');

        foreach($sql_files as $file){
            echo "Executando o arquivo '$file'...<br>";
                    
            $sql = file_get_contents($file);

            $stmt = $con->prepare($sql);
            $stmt->execute();
            echo "Script executado com sucesso <br>";
        }

        $con = null;
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
?>