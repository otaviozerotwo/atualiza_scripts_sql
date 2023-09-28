<?php
    phpinfo();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verifica se um diretório foi selecionado pelo usuário
        if (isset($_FILES["sql_folder"]) && $_FILES["sql_folder"]["error"] == 0) {
            //parâmetos de conexão com PostgreSQL
            $db_host = 'localhost';
            $db_name = 'teste';
            $db_user = 'postgres';
            $db_pass = '1234';

            //diretório onde os scripts serão lidos
            $sql_folder = 'D:\DEVOPS\PROJETOS\atualiza_bd\scripts';

            //conexão com o banco
            try {
                $db = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "Conexão com o banco de dados estabelecida\n";

                //leitura dos arquivos
                $sql_files = glob($sql_folder . '*.sql');

                foreach ($sql_files as $sql_file) {
                    $sql = file_get_contents($sql_file);
                    //executa o conteúdo do script SQL
                    $result = $db->exec($sql);

                    if ($result != false) {
                        echo "Arquivo '$sql_file' executado com sucesso.\n";
                    } else {
                        echo "Erro ao executar o arquivo 'sql_file'.\n";
                    }
                }
            } catch (PDOException $e) {
                echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            }
        }
    }
?>