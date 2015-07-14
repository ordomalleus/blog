<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/blog/views/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/blog/views/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/blog/views/css/colorbox.css" rel="stylesheet" type="text/css"/>
    <link href="/blog/views/css/my.css" rel="stylesheet" type="text/css"/>
    <script src="/blog/views/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/blog/views/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/blog/views/js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="/blog/views/js/my.js" type="text/javascript"></script>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <form class="form-horizontal" accept-charset="UTF-8"
                    method="POST" action="/blog/index.php">
                <input type="hidden" name="ctrl" value="news"/>
                <input type="hidden" name="act" value="Add"/>
                <div class="form-group">
                  <label for="exampleInputEmail1">Загаловок Новости</label>
                  <input type="text" class="form-control" 
                         id="exampleInputEmail1" placeholder="Загаловок" name="newName">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Текст новости</label>
                  <textarea class="form-control" rows="3" name="newText"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>