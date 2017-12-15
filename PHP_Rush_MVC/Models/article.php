<?php
class article extends appModel {
    
    function getArticles() {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id ORDER BY Article.Id DESC';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function userArticles($authorId) {
        $sql = 'SELECT * FROM Article where Author_id = '.$authorId.' ORDER BY Id DESC ';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    public function getArticle($id) {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id WHERE Article.Id = '.$id.'';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetch(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function getCategory() {
        $sql = 'SELECT * FROM Category';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function getNews() {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id  WHERE Category_id = 1 ORDER BY Article.Id DESC';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function getExpo() {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id  WHERE Category_id = 2 ORDER BY Article.Id DESC';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function getCours() {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id  WHERE Category_id = 3 ORDER BY Article.Id DESC';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function getMateriel() {
        $sql = 'SELECT *, users.Id as userId, Article.Id as articleId FROM Article JOIN users on Author_id = users.Id  WHERE Category_id = 4 ORDER BY Article.Id DESC';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
	    return $retour;
    }

    function addArticles($post) {
        $sql = 'INSERT INTO Article (Title, Content, Author_id, Date_creation, Date_edition, Category_id)
        VALUES (:title, :content, :author_id, NOW(), NOW(), :cat_id)';
        $result = Connect_db::getBdd()->prepare($sql);
        $result->execute(array(
            ':title'=> $post['titre'],
            ':content'=> $post['textarea'],
            ':author_id'=> $_SESSION['id'],
            ':cat_id'=> $post['category_id']
        ));
    }

    function updateArticle($post) {
        var_dump($post);
        $sql = 'UPDATE Article SET Title = :title, Content = :content, Author_id = :author_id, Date_edition = :dateedition, Category_id = :cat_id WHERE Id = '.$post['articleId'].' ';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute(array(
            ':title'=> $post['titre'],
            ':content'=> $post['textarea'],
            ':author_id'=> $_SESSION['id'],
            ':dateedition'=> date("Y-m-d"),
            ':cat_id'=> $post['category_id']
        ));
    }

    function deleteArticle($id) {
        $sql = 'DELETE FROM Article WHERE Id = '.$id.'';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
    }

    

    /*function addArticles($post) {
        //var_dump($post);
        //var_dump($_SESSION['id']);
        $sql = "INSERT INTO Article (Title, Content, Author_id, Category_id)
        VALUES ('Test2', 'blablabla', 1, 0)";
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
    }*/



}
?>