<?php
class Connection {

    public static function connect() {

        $link = new PDO("mysql:host=localhost;dbname=posystem", "root", "12345");

        $link->exec("set names utf8");

        return $link;
    }
}

?>