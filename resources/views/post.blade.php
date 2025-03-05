<!DOCTYPE html>

<title>Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1>
            <?= $post->title; ?>
        </h1>
        <?= $post->content; ?>
    </article>
    <a href="/">Back to Posts</a>
</body>