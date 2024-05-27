<?php include __DIR__ . '/../header.php'; ?>
<h1>
    <?= $article->getName() ?>
</h1>
<p>
    <?= $article->getText() ?>
</p>
<h4>Комментарии:</h4>
<?php foreach ($comments as $comment): ?>
    <?php if ($comment->getArticleId() == $matches[1]): ?>
        <p style="display: inline-block;margin-top: 20px;">
        <form action="/project/www/comments/edit/<?= $comment->getId(); ?>" method="post">
            <label><input style="padding: 10px;border-radius: 10px;" type="text" name="text"
                    value="<?= $comment->getText() ?>"></label>
            <br><br>
            <a class="btn btn-success" style="background-color: #CD1818; outline: none;"
                href="/project/www/comments/delete/<?= $comment->getId(); ?>">Delete</a>
            <input class="btn btn-success" type="submit" value="Редактировать">
        </form>
        </p>
    <?php endif; ?>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.html'; ?>