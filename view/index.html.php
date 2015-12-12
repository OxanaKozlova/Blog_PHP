<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>First Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <h1>Blog</h1>
          <!--  <div>
                <a href="index.php?action=add"> Добавить пост </a>
            </div>
            -->
            <div>
                <form method="post" action="index.php?action=add">
                    <label>
                        Тема
                        <input type="text" name="title" value="" class="form-item" autofocus required>
                    </label>
                    <label>
                        Пост
                        <textarea class="form-item" name="content" required> </textarea>
                    </label>
                    <input type="submit" value="Post" class="btn">
                </form
            </div>
            <div>
                <?php foreach($posts as $p): ?>
                    <div class="post">
                        <h3><?=$p['title']?></h3>
                        <p><?=$p['content']?></p>
                        <em>Published: <?=$p['date']?></em>
                        <form>
                          <input type="submit" value="Delete" class="btn">
                      </form>
                    </div>
                <?php endforeach ?>
            </div>
            <footer>
            	<p>First Blog<br>Copyright &copy; 2015</p>
            </footer>
        </div>
    </body>
</html>
