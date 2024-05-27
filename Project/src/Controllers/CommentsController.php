<?php

namespace Controllers;

use Models\Comments\Comment;
use Models\Users\User;
use View\View;
use Models\Articles\Article;

class CommentsController
{
    private $view;

    public function __construct() {
        $this->view = new View(__DIR__ . '/../../templates');
    }

    public function view(int $articleId) {
        $article = Article::getById($articleId);
        if ($article === null) {
            $this->view->renderHtml('/errors/error.php', [], 404);
            return;
        }

        $comments = Comment::findByArticleId($articleId);
        $this->view->renderHtml('/comments/comment.php', ['article' => $article, 'comments' => $comments]);
    }

    public function edit(int $commentId): void {
        $comment = Comment::getById($commentId);
        if ($comment === []) {
            $this->view->renderHtml('/errors/error.php', [], 404);
            return;
        }

        $article = Article::getById($comment->getArticleId());
        $comment->setText($_POST['text']);
        $comment->save();

        header('Location: /article/show/' . $article->getId());
    }

    public function add(): void {
        $authorId = (int)$_POST['author_id'];
        $articleId = (int)$_POST['article_id'];
        $text = $_POST['text'];

        $author = User::getById($authorId);
        $article = Article::getById($articleId);

        if ($author === null || $article === null) {
            $this->view->renderHtml('/errors/error.php', [], 404);
            return;
        }

        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setText($text);
        $comment->save();

        header('Location: /article/show/' . $articleId);
    }
    public function delete(int $commentId): void {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            $this->view->renderHtml('/errors/error.php', [], 404);
            return;
        }

        $articleId = $comment->getArticleId();
        $comment->delete();

        header('Location: /article/show/' . $articleId);
    }
}