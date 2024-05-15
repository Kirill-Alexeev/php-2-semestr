<?php

namespace Controllers;
use View\View;
use Models\Articles\Article;
use Models\Users\User;

class ArticleController{
    public $view;

    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');

    }
    
    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getByid($id);
        // if ($article === []){
        //     $this->view->renderHtml('errors/error.php', [], 404);
        //     return;
        // }
        // $user = User::getFieldById('nickname', $article->getAuthorId());
        // $this->view->renderHtml('articles/show.php', ['article'=>$article, 'user'=>$user]);
    }
    public function create(){
        return $this->view->renderHtml('articles/create.php');
    }
    public function store(){
        $article = new Article;
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
    }

}