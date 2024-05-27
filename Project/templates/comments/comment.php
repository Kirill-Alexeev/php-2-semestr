<?php include __DIR__ . '/../header.php'; ?>
<h1>
    <?= $article->getName() ?>
</h1>
<p>
    <?= $article->getText() ?>
</p>
<?php
$pattern = '~^comments/(\d+)$~';
preg_match($pattern, $_GET['route'], $matches);
?>
<h4>Комментарии:</h4>
<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <?php if ($comment->getArticleId() == $matches[1]): ?>
            <p style="display: inline-block;margin-top: 20px;">
            <form action="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comments/edit/<?= $comment->getId(); ?>" method="post">
                <label><input style="padding: 10px;border-radius: 10px;" type="text" name="text"
                        value="<?= $comment->getText() ?>"></label>
                <br><br>
                <a class="btn btn-success" style="background-color: #CD1818; outline: none;"
                    href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/comments/delete/<?= $comment->getId(); ?>">Удалить</a>
                <input class="btn btn-success" type="submit" value="Сохранить">
            </form>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Комментариев пока нет.</p>
<?php endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>