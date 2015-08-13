<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
<h2>News</h2>
<?php foreach ($articles as $item) :?>
<div>
    <h3><a href="//php2.local/article.php?id=<?php echo $item->id; ?>">
                <?php echo $item->title; ?></a></h3>
    <div><?php echo $item->article_prev; ?></div>
    <p><?php echo $item->author; ?></p>
    <p><?php echo $item->post_date; ?></p>
</div>
<?php endforeach; ?>
<p><a href="//php2.local/add.php">Добавить новую статью</a></p>
</body>
</html>