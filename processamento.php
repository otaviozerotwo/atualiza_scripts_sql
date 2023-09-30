<?php
    $db_host = 'localhost';
    $db_name = 'teste';
    $db_user = 'postgres';
    $db_pass = '1234';
    
    try {
        $con = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        echo "Conexão com o banco de dados estabelecida <br>";
    
        if (isset($_POST['action'])) {
            // Pega o local onde o arquivo é importado
            $scripts_folder = $_FILES['scripts_folder']['tmp_name'];
    
            foreach ($scripts_folder as $script_file) {
                $script_content = file_get_contents($script_file);
                $script_lines = explode(';', $script_content); // Divide o conteúdo em instruções SQL
    
                foreach ($script_lines as $sql) {
                    $sql = trim($sql);
    
                    if (!empty($sql)) {
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
    
                        echo "Script executado com sucesso! <br>";
                    }
                }
            }
        }
        $con = null;
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
?>    