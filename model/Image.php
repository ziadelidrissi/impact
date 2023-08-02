<?php

require_once('./config/connect_bddClass.php');

class Image {
    public $id;
    public $nom;
    public $image;
    public $idArticle;

    public function setImage(): void{
        $path = 'upload/';
        if(!empty($_FILES['image']))
        {
            $nameFile = $_FILES['image']['name'];
            $typeFile = $_FILES['image']['type'];
            $tmpFile = $_FILES['image']['tmp_name'];
            $errorFile = $_FILES['image']['error'];
            $sizeFile = $_FILES['image']['size'];
    
            $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
            $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/jiff'];
    
            $extension = explode('.', $nameFile);
    
            $max_size =5000000;
    
            if(in_array($typeFile, $type))
            {
                if(count($extension) <=2 && in_array(strtolower(end($extension)), $extensions))
                {
                    if($sizeFile <= $max_size && $errorFile == 0)
                    {
                        if(move_uploaded_file($tmpFile, $image = $path . uniqid() . '.' . end($extension)) )
                        {
                            $this->nom = '';
                            $this->image=$image;
                            echo "upload  effectué !";
                        }
                        else
                        {
                            echo "Echec de l'upload de l'image !";
                        }
                    }
                    else
                    {
                        echo "Erreur le poids de l'image est trop élevé !";
                    }
                }
                else
                {
                    echo "Merci d'upload une image !";
                }
            }
            else
            {
                echo "Type non autorisé !";
            }
        }
    }

}


class ImageRepository extends Connect_bdd {

    public function __construct() {
        parent::__construct();
    }

    function getImageByArticleId(int $idArticle): Image{
        $statement = $this->bdd->prepare(
            "SELECT * FROM image WHERE id_article = ?");
        $statement->execute([$idArticle]);
        $resReq = $statement->fetchAll();
    
        // Check if $resReq is empty
        if (empty($resReq)) {
            throw new Exception("No image found for article $idArticle");
        }
    
        // Loop through each row in $resReq
        foreach ($resReq as $row) {
            $image = new Image();
            $image->id = $row['id_image'];
            $image->nom = $row['nom_image'];
            $image->image = $row['image'];
            $image->idArticle = $row['id_article'];
        }
        return $image;
        
    }
    

    public function insertImage($image) {
        $req = $this->bdd->prepare('INSERT INTO image (nom_image, image, id_article) VALUES (?,?,?)');
        $req->execute([
            $image->nom,
            $image->image,
            $image->idArticle
        ]);
    }
}


?>