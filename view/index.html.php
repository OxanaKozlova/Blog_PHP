<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>First Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    </head>
    <body>
          <nav class="navbar navbar-dark bg-inverse">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#">Blog <span class="sr-only">(current)</span></a>
            </div>
          </nav>
          <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <div class="form">
                <form method="post" action="index.php?action=add">
                  <div class="form-group">
                    <input type="text" name="title" value="" class="form-control" placeholder="Title"
                        aria-describedby="basic-addon1"  autofocus required></p>
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                  </div>
                  <input type="submit" value="Post" class="btn btn-primary-outline btn-sm">
                </form>
              </div>
            </div>
            <div class="col-md-4">

            </div>

          </div>
          <?php
          $posts = Storage:: getInstance()->read_data();
           foreach($posts as $p): ?>
            <div class="row">
              <div class="col-md-3">

              </div>
              <div class="col-md-7">
                <div class="container">
                  <div class="post">
                    <h3><?=$p->get_title()?></h3>
                    <h6><em>Published: <?=$p->get_date()?></em></h6>
                    <p><?=$p->get_content()?></p>
                    <form>

                      <a href="index.php?action=delete&id=<?php echo $p->get_id(); ?>">
                                <input type="button" value="delete" class="btn btn-primary-outline btn-sm">
                            </a>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-4">

              </div>

            </div>
          <?php endforeach ?>
    </body>
</html>
