<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Автолига – нам 15 лет!</title>
    <meta name="description" content="">
    <meta name="author" content=" Made by Keyners">
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Crete+Round&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>

    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
</head>
<body style="background: url('images/photos/competitors.png') 100% 100% no-repeat fixed; background-size: cover">

<header>
    <nav>
        <div class="row">
            <a href="/" class="brand-logo col l2 m12 s12 center-align"><img src="images/photos/logo.png"></a>
            <ul class="center">
                <li><a href="/" class="black-text">ГЛАВНАЯ</a></li>
                <li><a href="/#take_part" class="black-text">КАК ПРИНЯТЬ УЧАСТИЕ?</a></li>
                <li><a href="competitors.php" class="black-text active">УЧАСТНИКИ</a></li>
                <li><a href="services.html" class="black-text">АВТОЦЕНТРЫ</a></li>
            </ul>
            <a href="#" id="pull"><img src="../images/photos/nav-icon.png"></a>

            <div class="right black-text">
                <span class="header-phone">8 (843) 555-68-68</span>
            </div>
        </div>
    </nav>
</header>

<div class="row">
    <div class="center-align white-text col l6 offset-l3 m6 offset-m3 s6 offset-s3">
        <div class="row">
            <div class="col l4 m4 s4" style="border-bottom: solid 1pt white">&ensp;</div>
            <div class="col l4 m4 s4">&ensp;</div>
            <div class="col l4 m4 s4" style="border-bottom: solid 1pt white">&ensp;</div>
        </div>

        <h4>Рейтинг участников</h4>

        <div class="row">
            <div class="col l4 m4 s4" style="border-top: solid 1pt white">&ensp;</div>
            <div class="col l4 m4 s4">&ensp;</div>
            <div class="col l4 m4 s4" style="border-top: solid 1pt white">&ensp;</div>
        </div>
    </div>
</div>

<? include 'functions.php' ?>
<div class="row full-page">
    <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1">
        <table class="bordered">
            <tr class="head">
                <td>Позиция</td>
                <td>Участники</td>
                <td>Кол-во кодов</td>
            </tr>

            <? $i = 1; ?>
            <? $competitors = get_competitors(); ?>
            <? foreach ($competitors as $competitor) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class="blue_text"><?= $competitor->name . " " . $competitor->lname. " ". mb_substr($competitor->fname, 0, 1, "utf-8"). "."; ?></td>
                    <td><?= $competitor->count ?></td>
                </tr>
                <? $i++; ?>
            <? endforeach; ?>

            <? if (empty($competitors)) : ?>
                <tr>
                    <td colspan="3">Нет участников</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</div>

<footer class="page-footer row">

    <div class="col l2 m4 s4">
        <img src="images/photos/logo.png">
    </div>

    <div class='col l8 m8 s8 social center-align'>
        <a href='https://vk.com/avtoliga'><img src='images/photos/vk.png' height="40" width="auto"></a>
        <a href='https://www.instagram.com/avtoliga/'><img src='images/photos/in.png' height="40" width="auto"></a>
        <a href='https://www.facebook.com/avtoliga1'><img src='images/photos/fb.png' height="40" width="auto"></a>
        <a href='https://www.youtube.com/channel/UCcZVPchHLH0m4lwhIMp6HPw'><img src='images/photos/yu.png' height="40"
                                                                                width="auto"></a>
        <a href='https://twitter.com/avtoliga'><img src='images/photos/tw.png' height="40" width="auto"></a>
    </div>

    <div class='col l2 m8 s8 right-align contacts'>
        <h5 class="white-text">8 (843) 555-68-68</h5>

        <p class="white-text copyright">Разработано в <a href="http://gnsis.ru/" class="white-text">"Genesis"</a></p>
    </div>
</footer>

<script>
    $(function() {
        var pull        = $('#pull');
        menu        = $('nav ul');
        menuHeight  = menu.height();

        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter38121970 = new Ya.Metrika({
                    id:38121970,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div style="display: none;"><img src="https://mc.yandex.ru/watch/38121970" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>