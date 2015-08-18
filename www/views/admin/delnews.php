<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete news</title>
</head>
<body>
<?php if ($deleted) : ?>
            <p>Новость - <b>"<?php echo $item->title; ?>"</b> от <?php echo $item->post_date; ?> - была удалена</p>
<?php else: ?>
            <h2>Выберите новость для удаления</h2>
            <?php foreach ($news as $val) : ?>
            <p><a href="/admin/delnews/<?php echo $val->id; ?>"><?php echo $val->title; ?></a>
                Post date: <?php echo $val->post_date; ?></p>
            <?php endforeach; ?>
<?php endif; ?>
</body>
</html>