<?php

require_once('./config/connect_bddClass.php');
require_once('Image.php');

class Article {
    public $id;
    public $titre;
    public $description;
    public $categorie;
    public $citation;
    public $image;

    public function createToInsert(array $articleForm):bool{
        if (empty($articleForm)){
            return false;
        }
        if(!isset($articleForm['titre']) && $articleForm['titre'] == ''){

            return false;
        }
        if(!isset($articleForm['description']) && $articleForm['description'] == ''){

            return false;
        }
        if(!isset($articleForm['categorie']) && $articleForm['categorie'] == 0){
            
            return false;
        }
        if(!isset($articleForm['citation']) && $articleForm['citation'] == 0){
            
            return false;
        }
        $image = new Image();
        $image->setImage();
        $this->titre = $articleForm['titre'];
        $this->description = $articleForm['description'];
        $this->categorie = $articleForm['categorie'];
        $this->citation = $articleForm['citation'];
        $this->image = $image;
        $this->image->nom = $this->titre;

        return true;
    }

}


class ArticleRepository extends Connect_bdd {
    public function __construct() {
        parent::__construct();
    }

    public function getArticle($idArticle) {
        $req = $this->bdd->prepare('SELECT * FROM article WHERE id_article =?');
        $req->execute([$idArticle]);
        $dataArticle = $req->fetch();
        $imageRepo = new ImageRepository();
        $article = new Article();
        $article->id = $dataArticle['id'];
        $article->titre = $dataArticle['titre'];
        $article->description = $dataArticle['description'];
        $article->categorie = $dataArticle['categorie'];
        $article->citation = $dataArticle['citation'];
        $article->image = $imageRepo->getImageByArticleId($idArticle);

        return $article;
    }

    public function getArticles() {
        $req = $this->bdd->prepare('SELECT * FROM article');
        $req->execute();
        $data = $req->fetchAll();
        $articles = [];
        foreach ($data as $articleBdd) {
            $article = new Article();
            $imageRepo = new ImageRepository();
            $article->id = $articleBdd['id_article'];
            $article->titre = $articleBdd['titre_article'];
            $article->description = $articleBdd['description_article'];
            $article->categorie = $articleBdd['categorie_article'];
            $article->citation = $articleBdd['citation_article'];
            $article->image  = $imageRepo->getImageByArticleId($article->id);
        }

        return $articles;
    }

    public function insertArticle(Article $article):void {
        $req = $this->bdd->prepare('INSERT INTO article (titre_article, description_article, categorie_article, citation_article) 
        VALUES (?,?,?,?)');
        $req->execute([
            $article->titre, 
            $article->description, 
            $article->categorie, 
            $article->citation
        ]);
        $article->id = $this->bdd->lastInsertId();
        $article->image->idArticle = $article->id;
        $imageRepo = new ImageRepository();
        $imageRepo->insertImage($article->image);
    }

}


?>