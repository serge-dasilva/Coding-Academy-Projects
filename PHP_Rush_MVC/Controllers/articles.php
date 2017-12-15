<?php
session_start();
class articles extends appController { 

    function index() {
        $this->loadModel('article');
        $arr['allArticle'] = $this->article->getArticles();
        $this->set($arr);
        $this->render('index');
    }

    public function getArticle($id) {
        $this->loadModel('article');
        $arr['article'] = $this->article->getArticle($id);
        $this->set($arr);
        $this->render('article');
    }

    public function getNews() {
        $this->loadModel('article');
        $arr['article'] = $this->article->getNews();
        $this->set($arr);
        $this->render('indexNews');
    }

    public function getExpo() {
        $this->loadModel('article');
        $arr['article'] = $this->article->getExpo();
        $this->set($arr);
        $this->render('indexExpo');
    }

    public function getCours() {
        $this->loadModel('article');
        $arr['article'] = $this->article->getCours();
        $this->set($arr);
        $this->render('indexCours');
    }

    public function getMateriel() {
        $this->loadModel('article');
        $arr['article'] = $this->article->getMateriel();
        $this->set($arr);
        $this->render('indexMateriel');
    }

    public function updateArticle($id) {
        $this->loadModel('article');
        $arr['article'] = $this->article->getArticle($id);
        $arr['allCategory'] = $this->article->getCategory();
        $this->set($arr);
        $this->render('updateArticle');
    }

    public function upArticle() {
        $this->loadModel('article');
        if (isset($_POST['titre'])
            && isset($_POST['category_id'])
                && isset($_POST['textarea'])) {
            $this->article->updateArticle($_POST);
            header('Location: http://localhost/PHP_Rush_MVC/articles/index');
        }
    }

    public function myArticles() {
        $this->loadModel('article');
        $arr['myArticles'] = $this->article->userArticles($_SESSION['id']);
        $this->set($arr);
        $this->render('myArticles');
    }

    public function writeArticle() {
        $this->loadModel('article');
        $arr['allCategory'] = $this->article->getCategory();
        $this->set($arr);
        $this->render('writeArticle');
        header('Location: http://localhost/PHP_Rush_MVC/articles/index');
    }

    public function deleteArticle($id) {
        $this->loadModel('article');
        $this->article->deleteArticle($id);
        header('Location: http://localhost/PHP_Rush_MVC/articles/index');
    }

    public function articleCheck() {
        $this->loadModel('article');
        if (isset($_POST['titre']) 
            && isset($_POST['category_id'])
                && isset($_POST['textarea'])) {
            $this->article->addArticles($_POST);        
        } else {
            echo 'Veuillez remplir tous les champs';
        }
    }
}
?>