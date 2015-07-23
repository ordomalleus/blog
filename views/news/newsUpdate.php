<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo $this->base; ?>"/>
    <link href="views/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="views/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="views/css/colorbox.css" rel="stylesheet" type="text/css"/>
    <link href="views/css/my.css" rel="stylesheet" type="text/css"/>
    <script src="views/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="views/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="views/js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="views/js/my.js" type="text/javascript"></script>
</head>
<body>
<section>
    <div class="container">
        <div class="row-">
            <col-md-12>
                <a class="btn btn-primary" role="button" href="/index.php?ctrl=news&act=ShowAll">Вкрнуться к новостям</a>
            </col-md-12>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" accept-charset="UTF-8"
                      method="POST" action="/index.php">
                    <input type="hidden" name="ctrl" value="news"/>
                    <input type="hidden" name="act" value="Update"/>
                    <input type="hidden" name="id" value="<?php echo $new->id; ?>"/>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Загаловок Новости</label>
                        <input type="text" class="form-control"
                               id="exampleInputEmail1" placeholder="Загаловок" name="newName"
                               value="<?php echo $new->title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Текст новости</label>
                        <textarea class="form-control" rows="3" name="newText"><?php echo $new->text; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Обновить новость</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>