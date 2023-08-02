<?php
require_once('model/Article.php');
function admin(): void {
    $articleRepository = new ArticleRepository();
    $articles = $articleRepository->getArticles();

    if(!empty($_SESSION) && $_SESSION['id_role'] == 2) {
        require_once('view/admin.php');
    } else {
        header('Location: ?action=form');
    }
}

function addArticleForm(): void {
    if(!empty($_SESSION) && $_SESSION['id_role'] == 2) {
        require_once('view/addArticle.php');
    } else {
        header('Location: ?action=form');
    }
}

function addArticle(): void {
    $article = new Article();
    if($article->createToInsert($_POST)) {
        $articleRepository = new ArticleRepository();
        $articleRepository->insertArticle($article);
        var_dump("added");
        // header('Location:?admin=');
    } else {
        var_dump("not added");
        // header('Location: ?admin=&action=addArticle');
    }
}

?>