<?php

require_once('./config/connect_bddClass.php');

class User {
    public $id;
    public $nom;
    public $email;
    public $mdp;
    public $token;
    public $actif;
    public $id_role;


public function createToSignIn(array $userForm):bool {
        if(!isset($userForm['nom']) OR $userForm['nom'] == ''){
            
            return false;
        }
        if(!isset($userForm['email']) OR $userForm['email'] == ''){

            return false;
        }
        if(isset($userForm['mdp'])){

            $this->mdp = $userForm['mdp'];
        } else {
            return false;
        }

        $this->nom = $userForm['nom'];
        $this->email = $userForm['email'];

        return true;
    }
}


class UserRepository extends Connect_bdd {
    public function __construct() {
        parent::__construct();
    }

    public function getUserByNomAndEmail($nom, $email) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE nom_user = ? AND email_user = ?');
        $req->execute([$nom,$email]);
        $data = $req->fetch();
        if($data != false) {
            $user = new User();
            $user->id = $data['id_user'];
            $user->nom = $data['nom_user'];
            $user->email = $data['email_user'];
            $user->mdp = $data['mdp_user'];
            $user->id_role = $data['id_role'];

            return $user;
        } else {
            return [];
        }
    }

    public function getUserByNom($nom) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE nom_user = ?');
        $req->execute([$nom]);
        $data = $req->fetch();
        if($data!= false) {
            $user = new User();
            $user->id = $data['id_user'];
            $user->nom = $data['nom_user'];
            $user->email = $data['email_user'];
            $user->mdp = $data['mdp_user'];
            $user->token = $data['token_user'];
            $user->actif = $data['actif_user'];
            $user->id_role = $data['id_role'];

            return $user;
        } else {
            return [];
        }
    }
    public function getUserByEmail($email) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE email_user =?');
        $req->execute([$email]);
        $data = $req->fetch();
        if($data!= false) {
            $user = new User();
            $user->id = $data['id_user'];
            $user->nom = $data['nom_user'];
            $user->email = $data['email_user'];
            $user->mdp = $data['mdp_user'];
            $user->id_role = $data['id_role'];

            return $user;
        } else {
            return [];
        }
    }

    public function insertUser(User $user) {
        $req = $this->bdd->prepare('INSERT INTO user (nom_user, email_user, mdp_user, token_user, actif_user, id_role) VALUES (?,?,?,?,?,?)');
        $req->execute([
            $user->nom,
            $user->email,
            $user->mdp,
            $user->token = substr(uniqid('', true), 0, 26),
            0,
            1,
        ]);
    }
    
    public function checkActivation($token) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE token_user =?');
        $req->execute([$token]);
        $data = $req->fetch();
        if ($data['actif_user'] == 0) {
            $req = $this->bdd->prepare('UPDATE user SET actif_user = 1 WHERE token_user =?');
            $req->execute([$token]);
            $data = $req->fetch();
        }
    }

    public function getUserByToken($token) {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE token_user = ?');
        $req->execute([$token]);
        $data = $req->fetch();
        if ($data) {
            $user = new User();
            $user->id = $data['id_user'];
            $user->nom = $data['nom_user'];
            $user->email = $data['email_user'];
            $user->mdp = $data['mdp_user'];
            $user->id_role = $data['id_role'];
            return $user;
        } else {
            return false;
        }
    }
    

}

?>