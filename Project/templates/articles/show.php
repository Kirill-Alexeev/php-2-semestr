<?php require(__DIR__.'/../header.php');?>
    <div class="card mt-3" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title"><?=$article->getName();?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?=$user->getNickname();?></h6>
        <p class="card-text"><?=$article->getText();?></p>
        <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/edit/<?=$article->getId();?>" class="card-link">Edit Article</a>
        <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/delete/<?=$article->getId();?>" class="card-link">Delete Article</a>
        </div>
    </div>
    <h4 class="card-title">Комментарии:</h4>
    <?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <?php if ($comment->getArticleId() == $matches[1]): ?>
            <div class="card" style="padding: 20px; margin-bottom: 10px;background-color: #E3F4F4">
                <p><b>Автор: </b><?=$comment->getAuthorId()->getNickname();?></p>
                <p class="card-subtitle"><?= $comment->getText() ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Комментариев пока нет.</p>
    <?php endif; ?>

  <div class = "form">
      <form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comments/add/<?= $article->getId() ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Текст комментария</label>
                <textarea type="text" name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <input style="display:none;" type="text" name="author_id" value="<?=$user->getId();?>">
                <input style="display:none;" type="text" name="article_id" value="<?=$article->getId();?>">
            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
      </form>
  </div>

  <p><a class="btn btn-success" href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comments/<?= $article->getId() ?>">Редактировать комментарии</a></p>
<?php require(__DIR__.'/../footer.php');?>