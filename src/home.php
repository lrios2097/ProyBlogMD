<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/resources/main.css">
    <title>Home</title>
</head>
<body>
    <?php require "resources/navbar.php" ?>
    
    <div class="posts-container">
    <h1>Bienvenido a mi Blog</h1>

    <?php
    use Proyphp\Blog\model\Post;

    $posts = Post::getPosts();
        
        foreach ($posts as $post) {
            echo "<div><a href='{$post->getUrl()}' class='post'>{$post->getPostName()}</a></div>"; //min 1:15:42
        }
    ?>
    </div>
</body>
</html>