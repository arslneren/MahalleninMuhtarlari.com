<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <?php
    if($page == "adaylar"){
        echo '<link rel="canonical" href="https://mahalleninmuhtarlari.com/adaylar/"/>
        <title>Adaylar | Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    else if($page == "hakkimizda"){
        echo '
        <link rel="canonical" href="https://mahalleninmuhtarlari.com/uyelik/"/>
        <title>Üyelik | Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    else if($page == "iletisim"){
        echo '
        <link rel="canonical" href="https://mahalleninmuhtarlari.com/iletisim/"/>
        <title>İletişim | Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    else if($page == "muhtarlar"){
        echo '
        <link rel="canonical" href="https://mahalleninmuhtarlari.com/muhtarlar/"/>
        <title>Muhtarlar | Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    else if($page == "home"){
        echo '
        <link rel="canonical" href="https://mahalleninmuhtarlari.com/"/>
        <title>Anasayfa | Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    else if($page == "detail"){
        echo $title;
    }
    else{

        echo '
        <link rel="canonical" href="https://mahalleninmuhtarlari.com/"/>
        <title>Mahallenin Muhtarları</title><meta property="og:image" content="https://mahalleninmuhtarlari.com/assets/img/metashare.png">
        <meta name="description" content="Mahalle muhtarlığına aday olanların profillerini keşfedin ve gelecekteki muhtarlarınızı daha yakından tanıyın. Mahallenizin muhtar adaylarını görüntüleyin ve onların projelerini öğrenin.">
        ';
    }
    ?>
    <meta name="keywords" content="Mahallenin Muhtarları, mahalle, muhtar, muhtar adayı, aday, bizim muhtar, muhtar sorgula, hangi muhtar, muhtar nerede, muhtar ol, muhtarımız kim"/>
    <base href="https://mahalleninmuhtarlari.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<div class="container">
    <div class="menu">
        <div class="content">
            <ul>
                <li class="logo"><a href="./"><img src="assets/img/logo.png" alt=""></a></li>
                <li <?php if($page=='home'){echo 'class="active";';}?>><a href="./">ANASAYFA</a></li>
                <li <?php if($page=='adaylar'){echo 'class="active";';}?>><a href="adaylar/">ADAYLAR</a></li>
                <li <?php if($page=='muhtarlar'){echo 'class="active";';}?>><a href="muhtarlar/">MUHTARLAR</a></li>
                <li <?php if($page=='hakkimizda'){echo 'class="active";';}?>><a href="uyelik/">ÜYELİK</a></li>
                <li <?php if($page=='iletisim'){echo 'class="active";';}?>><a href="iletisim/">İLETİŞİM</a></li>
                <span class="clear"></span>
            </ul>
            <div class="menuBtn">
                <a href="./uye"><span>ÜYE GİRİŞİ</span></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="mobMenu">
        <div class="content">
            <div class="mLogo"><a href="./"><img src="assets/img/logo.png" alt="Site Logo"></a></div>

            <div class="mMenuBtn"  onclick="mobMenu()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="overlay" onclick="mobMenu()">
        <div class="overlayArea"></div>
    </div>
    <div class="mobMenuArea">
        <div class="mobContent">
            <div class="mMenuBtn"  onclick="mobMenu()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="clear"></div>
            <ul>
                <li><a href="/">Anasayfa</a></li>
                <li><a href="adaylar">Adaylar</a></li>
                <li><a href="muhtarlar">Muhtarlar</a></li>
                <li><a href="uyelik">Üyelik</a></li>
                <li><a href="iletisim">İletişim</a></li>
                <li><a href="uye">Üye Girişi</a></li>
                <span class="clear"></span>
            </ul>
        </div>
    </div>