<?php
    use Proyphp\Blog\model\Post;
    $post = new Post($postName . '.md')


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mi primer post</h1>
    <?php
        
        echo $post->getContent();

        
 /*       */
    ?>
</body>
</html>