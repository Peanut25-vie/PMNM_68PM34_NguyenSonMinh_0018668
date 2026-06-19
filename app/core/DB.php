<?php
class ConnectDB {
    private static $host = 'localhost';
    private static $db_name = '68PM34';
    private static $username = 'root';
    private static $password = ''; 
    public static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            try {
               
                self::$conn = new PDO(
                    'mysql:host=' . self::$host . ';port=3308;dbname=' . self::$db_name . ';charset=utf8',
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die('Lỗi kết nối CSDL: ' . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
