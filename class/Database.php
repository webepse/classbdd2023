<?php
namespace App;

use PDO;

class Database{
    private $dbName;
    private $dbUser;
    private $dbPass;
    private $dbHost;

    private $bdd;

    public function __construct(string $dbName, string $dbUser = 'root', string $dbPass = '', string $dbHost = 'localhost')
    {
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbHost = $dbHost;
    }

    private function getBDD()
    {
        if($this->bdd === NULL)
        {
            // instance de PDO
            try{
                $bdd = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=utf8",$this->dbUser,$this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $this->bdd = $bdd;
            }catch(Exception $e)
            {
                die('ERREUR '.$e->getMessage());
            }
        }
        return $this->bdd;
    }

    public function query($statement)
    {
        $req = $this->getBDD()->query($statement);
        $datas = $req->fetchAll();
        $req->closeCursor();
        return $datas;
    }



}