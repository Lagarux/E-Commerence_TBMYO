<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=io_tbmyo;charset=utf8", "root");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>