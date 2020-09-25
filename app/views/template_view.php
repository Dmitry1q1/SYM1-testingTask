<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="/js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="/js/main.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <?php 
        if($content_view == "main_view.php"): 
            if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == 1){
                ?><a href="/exit.php">Log out</a><?php
            }else{
            ?>
             <a href="/admin">Log in</a>
             <?
            }
        endif;?>
    </header>
    <main>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12">
                    <?php include 'app/views/'.$content_view; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>