<?php

namespace MHUb;

use PDO;
use PDOException;

class Connect
{
    private static $instance;
    protected PDO $pdo;
    private function __construct()
    {
        try {
            $this->pdo = new PDO("sqlite:" . __DIR__ . "/resource/db.sqlite");
            // Set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function prepare($SQL)
    {
        return $this->pdo->prepare($SQL);
    }

    function query($SQL)
    {
        return $this->pdo->query($SQL);
    }
}
