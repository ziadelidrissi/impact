<?php
class Connect_bdd{
    public $bdd;

    public function __construct(){
        $user = "root";
        $pass = "";
        $host = "";
        $port = '3306';
        $db = "impact";
        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}

$connexion = new Connect_bdd();

// if($connexion) {
//     echo '<span class="text-blue-500">CONNEXION AU SERVEUR RÉUSSIE</span>';
// }
// else {
//     echo "CONNEXION AU SERVEUR ÉCHOUÉE";
// }

?>