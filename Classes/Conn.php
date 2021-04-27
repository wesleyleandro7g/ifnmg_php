<?php
    abstract class Conn {
        private static string $db = "mysql";
        private static string $host = "localhost";
        private static string $user = "root";
        private static string $pass = "";
        private static string $dbname = "dados";
        private static int $port = 3606;
        private static object $connect;

        public function connect() {
            try {
                self::$connect = new PDO(self::$db . ':host=' . self::$host . ';port=' .
                self::$port . ';dbname=' . self::$dbname, self::$user, self::$pass);
                return self::$connect;
            } catch (Exception $err) {
                die('Erro: Houve um erro ao conectar ao banco de dados!');
            }
        }
    }
?>