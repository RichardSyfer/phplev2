<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new article</title>
</head>
<body>
<form action="/" method="post">
    <p>
        <label for="title">Заголовок
            <input type="text" name="title">
        </label>
    </p>
    <p>
        <label for="article_prev">Превью статьи
            <textarea name="article_prev" cols="130" rows="10" maxlength="512"></textarea>
        </label>
    </p>
    <p>
        <label for="article_txt">Вся статья
            <textarea name="article_txt" cols="130" rows="30" maxlength="4096"></textarea>
        </label>
    </p>
    <p>
        <label for="author">Автор
            <input type="text" name="author">
        </label>
    </p>
    <p>
        <label for="post_date">Дата публикации
            <input type="date" name="post_date">
        </label>
    </p>
    <input type="submit">
</form>
<a href="/">To main page</a>
</body>
</html>