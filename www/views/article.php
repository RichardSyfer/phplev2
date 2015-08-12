<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article page</title>
</head>
<body>
<?php foreach ($article as $item) : ?>
<div>
    <h3><?php echo $item['title']; ?></h3>
    <div><?php echo $item['article_txt']; ?></div>
    <p><?php echo $item['author']; ?></p>
    <p><?php echo $item['post_date']; ?></p>
</div>
<?php endforeach; ?>
</body>
</html>