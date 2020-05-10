<?php
?>
<!doctype html>
<html class="no-js" lang="pl">
<head>
    <meta charset="utf-8">
    <title>KlubFC - Strona Główna</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main_page.css">
    <link rel="stylesheet" href="css/tickets.css">
    <link rel="stylesheet" href="css/equinox.css">
    <meta name="theme-color" content="#fafafa">
</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="loading">
    <img src="./img/loader/loader.gif" class="loader" alt="Loading..." />
</div>

<div class="container bg-white">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1"></div>
            <div class="col-4 text-center">
                <ul class="d-flex align-items-end pl-0">
                    <li class="d-inline-flex"><a class="blog-header-logo text-dark text-uppercase mr-3" href="#">Strona</a></li>
                    <li class="d-inline-flex"><a href="index.php"><img class="img img-fluid logo" src="./img/logo.png" /></a></li>
                    <li class="d-inline-flex"><a class="blog-header-logo text-dark text-uppercase ml-3" href="#">klubu</a></li>
                </ul>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
                <a class="btn btn-sm btn-outline-primary" href="./admin/login.html">Moje konto</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted menu-link" href="tickets.php">Bilety i karnety</a>
            <a class="p-2 text-muted menu-link" href="events.php">Wydarzenia</a>
            <a class="p-2 text-muted menu-link" href="team.php">Zespół</a>
            <a class="p-2 text-muted menu-link" href="history.php">Historia</a>
            <a class="p-2 text-muted menu-link" href="stadium.php">Stadion</a>
            <a class="p-2 text-muted menu-link" href="sponsors.php">Sponsorzy</a>
            <a class="p-2 text-muted menu-link" href="live.php">Relacje LIVE</a>
        </nav>
    </div>
</div>
</div>

<main role="main" class="container bg-white mb-4 pb-4">
    <div class="row">
        <div class="col-md-12 blog-main events-main">
            <h3 class="mt-4 pb-2 font-weight-light border-bottom d-flex"><a href="index.php"><ion-icon name="chevron-back-outline"></ion-icon></a> Bilety i karnety</h3>
            <div class="stadium-map text-center">
                <p class="text-left mb-2">Poniżej zaprezentowana została mapa stadionu. Wybierz sektor, a następnie miejsce. Poniżej, przedstawione zostaną szczegółowe informacje odnośnie wybranych biletów i/lub karnetów.</p>
                <svg id="stadium" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="297mm" height="210mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                     viewBox="0 0 29700 21000"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
 <defs>
     <style type="text/css">
         <![CDATA[
         .str0 {stroke:white;stroke-width:50}
         .fil4 {fill:none}
         .fil1 {fill:#006643}
         .fil3 {fill:#008925}
         .fil2 {fill:#328468}
         .fil0 {fill:#636363}
         ]]>
     </style>
 </defs>
                    <g id="Warstwa_x0020_1">
                        <path class="fil0" d="M23560 5786c0,73 88,49 164,49l-328 33c0,-199 8,-130 -119,-242 -65,-58 -60,-75 -144,-119 -87,58 -225,234 -332,340 -58,58 -324,295 -324,365l0 1557 3279 0 0 -1967c0,-37 13,-36 33,-66l-1984 0c-77,0 -246,-31 -246,49z"/>
                        <path class="fil0" d="M25757 15246l0 -1951c-275,0 -529,-16 -820,-17 -131,-1 -242,17 -393,17l-2066 0 0 1508c0,92 222,280 316,373 82,81 268,325 357,348 52,-35 79,-77 129,-117 132,-105 117,-67 117,-243l328 0 0 49c-108,0 -164,-26 -164,66 0,79 155,49 230,49l2017 0c-23,-34 -49,-43 -49,-82z"/>
                        <path class="fil0" d="M25708 11458l-3181 0c-38,0 -49,11 -49,49l0 1689c0,38 11,49 49,49l2017 0c158,0 269,-17 410,-17 142,1 285,-2 427,0 109,1 376,68 376,-32l0 -1689c0,-38 -11,-49 -49,-49z"/>
                        <path class="fil0" d="M25708 9639l-3181 0c-38,0 -49,11 -49,49l0 1721 3279 0 0 -1721c0,-38 -11,-49 -49,-49z"/>
                        <path class="fil0" d="M24134 7835l-1656 0 0 1705c0,38 11,49 49,49l3230 0 0 -1754c-268,0 -519,-16 -804,-17 -131,-1 -242,17 -393,17 -142,0 -284,0 -426,0z"/>
                        <g id="sectorA" data-toggle="tooltip" data-placement="top" title="Sektor A">
                            <path class="fil1" d="M24872 3343l-1529 1537c127,183 218,134 218,314 0,147 -36,493 48,493l2197 0 0 -1410c0,-54 -175,-199 -217,-242l-471 -463c-90,-68 -152,-167 -246,-230z"/>
                        </g><g id="sectorB" data-toggle="tooltip" data-placement="top" title="Sektor B">
                            <path class="fil1" d="M14232 16442l0 2180c0,38 11,49 49,49l1738 0 0 -2230 -1787 0z"/>
                        </g><g id="sectorC" data-toggle="tooltip" data-placement="top" title="Sektor C">
                            <path class="fil1" d="M23609 15377c-84,0 -48,326 -48,477 0,124 -18,108 -87,175 -47,46 -92,83 -127,135l1537 1545c52,-75 355,-347 467,-459 61,-61 455,-429 455,-480l0 -1394 -2197 0z"/>
                        </g><g id="sectorD" data-toggle="tooltip" data-placement="top" title="Sektor D">
                            <polygon class="fil1" points="16068,16442 16068,18672 17838,18672 17838,16442 "/>
                        </g><g id="sectorE" data-toggle="tooltip" data-placement="top" title="Sektor E">
                            <polygon class="fil1" points="10608,16442 10608,18672 12379,18672 12379,16442 "/>
                        </g><g id="sectorF" data-toggle="tooltip" data-placement="top" title="Sektor F">
                            <path class="fil1" d="M19740 2376c-38,0 -49,11 -49,49l0 2180 1771 0 0 -2230 -1721 0z"/>
                        </g><g id="sectorG" data-toggle="tooltip" data-placement="top" title="Sektor G">
                            <path class="fil1" d="M8789 16442l0 2180c0,38 11,49 49,49l1721 0 0 -2230 -1771 0z"/>
                        </g><g id="sectorH" data-toggle="tooltip" data-placement="top" title="Sektor H" >
                            <path class="fil1" d="M17888 16442l0 2180c0,38 11,49 49,49l1721 0 0 -2230 -1771 0z"/>
                        </g><g id="sectorI" data-toggle="tooltip" data-placement="top" title="Sektor I">
                            <path class="fil1" d="M8838 2376c-38,0 -49,11 -49,49l0 2180 1771 0 0 -2230 -1721 0z"/>
                        </g><g id="sectorJ" data-toggle="tooltip" data-placement="top" title="Sektor J">
                            <polygon class="fil1" points="19707,16442 19707,18672 21462,18672 21462,16442 "/>
                        </g><g id="sectorK" data-toggle="tooltip" data-placement="top" title="Sektor K">
                            <polygon class="fil1" points="12428,16442 12428,18672 14182,18672 14182,16442 "/>
                        </g><g id="sectorL" data-toggle="tooltip" data-placement="top" title="Sektor L">
                            <path class="fil1" d="M12199 2376l-1590 0 0 2230 1639 0 0 -2180c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorM" data-toggle="tooltip" data-placement="top" title="Sektor M">
                            <polygon class="fil1" points="18035,2376 18035,4606 19642,4606 19642,2376 "/>
                        </g><g id="sectorN" data-toggle="tooltip" data-placement="top" title="Sektor N">
                            <polygon class="fil1" points="21511,2376 21511,4606 22954,4606 22954,2376 "/>
                        </g><g id="sectorO" data-toggle="tooltip" data-placement="top" title="Sektor O">
                            <polygon class="fil1" points="7313,2376 7313,4606 8739,4606 8739,2376 "/>
                        </g><g id="sectorP" data-toggle="tooltip" data-placement="top" title="Sektor P">
                            <path class="fil1" d="M21527 16442l0 2230 1377 0c38,0 49,-11 49,-49l0 -2180 -1426 0z"/>
                        </g><g id="sectorR" data-toggle="tooltip" data-placement="top" title="Sektor R">
                            <path class="fil1" d="M7215 2376l-820 0c-50,0 -427,402 -488,463 -100,101 -396,347 -480,471l1529 1537c51,-33 90,-82 139,-131 91,-91 79,-109 168,-111l0 -2180c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorS" data-toggle="tooltip" data-placement="top" title="Sektor S">
                            <path class="fil1" d="M23888 2376l-836 0c-38,0 -49,11 -49,49l0 2180c154,0 180,142 312,230l1521 -1529 -697 -705c-44,-44 -196,-225 -250,-225z"/>
                        </g><g id="sectorT" data-toggle="tooltip" data-placement="top" title="Sektor T">
                            <path class="fil1" d="M23302 16209c-68,99 -184,234 -299,234l0 2230 885 0c76,0 800,-817 951,-918l-1537 -1545z"/>
                        </g><g id="sectorU" data-toggle="tooltip" data-placement="top" title="Sektor U">
                            <path class="fil1" d="M5383 3355l-713 689c-44,44 -225,196 -225,250l0 787c0,38 11,49 49,49l2180 0c56,0 110,-138 246,-230l-1537 -1545z"/>
                        </g><g id="sectorV" data-toggle="tooltip" data-placement="top" title="Sektor W">
                            <polygon class="fil1" points="7756,16442 7756,18672 8739,18672 8739,16442 "/>
                        </g><g id="sectorW" data-toggle="tooltip" data-placement="top" title="Sektor X">
                            <path class="fil1" d="M13166 4130l0 -1705c0,-38 -11,-49 -49,-49l-820 0 0 2230 1082 0 0 -475 -213 0z"/>
                        </g><g id="sectorX" data-toggle="tooltip" data-placement="top" title="Sektor Z">
                            <polygon class="fil1" points="17117,2376 17117,4130 16888,4130 16888,4606 17970,4606 17970,2376 "/>
                        </g>
                        <g id="sectorB1" data-toggle="tooltip" data-placement="top" title="Sektor B1">
                        <path class="fil2" d="M13887 15328l-1721 0c-38,0 -49,11 -49,49l0 1016 1820 0 0 -1016c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorB2" data-toggle="tooltip" data-placement="top" title="Sektor B2">
                        <path class="fil2" d="M15838 15328c-38,0 -49,11 -49,49l0 1016 1803 0 0 -1066 -1754 0z"/>
                        </g><g id="sectorB3" data-toggle="tooltip" data-placement="top" title="Sektor B3">
                        <path class="fil2" d="M21167 15328l-1738 0 0 1066 1787 0 0 -1016c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorB4" data-toggle="tooltip" data-placement="top" title="Sektor B4">
                        <polygon class="fil2" points="14248,4655 14248,5720 16019,5720 16019,4655 "/>
                        </g><g id="sectorB5" data-toggle="tooltip" data-placement="top" title="Sektor B5">
                        <polygon class="fil2" points="8985,4655 8985,5720 10756,5720 10756,4655 "/>
                        </g><g id="sectorB6" data-toggle="tooltip" data-placement="top" title="Sektor B6">
                        <path class="fil2" d="M8559 15328c-38,0 -49,11 -49,49l0 1016 1771 0 0 -1066 -1721 0z"/>
                        </g><g id="sectorB7" data-toggle="tooltip" data-placement="top" title="Sektor B7">
                        <path class="fil2" d="M19527 4655l0 1066 1705 0c38,0 49,-11 49,-49l0 -1016 -1754 0z"/>
                        </g><g id="sectorB8" data-toggle="tooltip" data-placement="top" title="Sektor B8">
                        <path class="fil2" d="M15691 15328l-1656 0c-38,0 -49,11 -49,49l0 1016 1754 0 0 -1016c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorB9" data-toggle="tooltip" data-placement="top" title="Sektor B9">
                        <path class="fil2" d="M12018 15328l-1639 0c-38,0 -49,11 -49,49l0 1016 1738 0 0 -1016c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorB10" data-toggle="tooltip" data-placement="top" title="Sektor B10">
                        <polygon class="fil2" points="17658,15328 17658,16393 19380,16393 19380,15328 "/>
                        </g><g id="sectorB11" data-toggle="tooltip" data-placement="top" title="Sektor B11">
                        <path class="fil2" d="M7657 14983l-902 0c0,630 -56,462 217,734 114,114 592,676 717,676l771 0 0 -1016c0,-109 -404,-16 -537,-53l-165 -130c-114,-102 5,-210 -101,-210z"/>
                        </g>
                        <g id="sectorB30" data-toggle="tooltip" data-placement="top" title="Sektor B30">
                        <path class="fil1" d="M13215 2376l0 1705 230 0 0 525 689 0 0 -557c0,-38 -11,-49 -49,-49l-803 0 0 -312 934 0 0 -1312 -1000 0z"/>
                        </g>
                        <g id="sectorB31" data-toggle="tooltip" data-placement="top" title="Sektor B31">
                        <path class="fil1" d="M17019 2376l-951 0 0 1312 935 0 0 312 -803 0c-38,0 -49,11 -49,49l0 557 689 0 0 -525c160,0 230,22 230,-49l0 -1607c0,-38 -11,-49 -49,-49z"/>
                        </g><g id="sectorB12" data-toggle="tooltip" data-placement="top" title="Sektor B12">
                        <path class="fil2" d="M12625 4655l0 1016c0,38 11,49 49,49l853 0 0 -328 672 0 0 -738 -1574 0z"/>
                        </g><g id="sectorB13" data-toggle="tooltip" data-placement="top" title="Sektor B13">
                        <polygon class="fil2" points="16084,4655 16084,5392 16773,5392 16773,5720 17642,5720 17642,4655 "/>
                        </g><g id="sectorA1" data-toggle="tooltip" data-placement="top" title="Sektor A1">
                            <path class="fil1" d="M15969 2376l-1656 0c-38,0 -49,11 -49,49l0 1262 1754 0 0 -1262c0,-38 -11,-49 -49,-49z"/>
                            <path class="fil1" d="M16051 3999l-1869 0 0 607 1918 0 0 -557c0,-38 -11,-49 -49,-49z"/>
                        </g>
                        <g id="sectorB23" data-toggle="tooltip" data-placement="top" title="Sektor B23">
                        <path class="fil2" d="M21855 15328l-541 0c-38,0 -49,11 -49,49l0 1016 1279 0c-22,-95 11,-306 -45,-381l-210 -233c-59,-76 -388,-452 -433,-452z"/>
                        </g><g id="sectorB14" data-toggle="tooltip" data-placement="top" title="Sektor B14">
                        <path class="fil2" d="M7756 4655c0,465 -46,421 127,594l408 411c35,40 32,60 104,60l525 0 0 -1066 -1164 0z"/>
                        </g><g id="sectorB15" data-toggle="tooltip" data-placement="top" title="Sektor B15">
                        <path class="fil2" d="M21330 4655l0 1016c0,38 11,49 49,49 668,0 435,46 701,-217l420 -465c46,-71 -23,-169 27,-383l-1197 0z"/>
                        </g><g id="sectorB16" data-toggle="tooltip" data-placement="top" title="Sektor B16">
                        <polygon class="fil2" points="17691,4655 17691,5720 18560,5720 18560,4655 "/>
                        </g><g id="sectorB17" data-toggle="tooltip" data-placement="top" title="Sektor B17">
                        <path class="fil2" d="M11707 4655l0 1016c0,38 11,49 49,49l820 0 0 -1066 -869 0z"/>
                        </g><g id="sectorB18" data-toggle="tooltip" data-placement="top" title="Sektor B18">
                        <path class="fil2" d="M18609 4655l0 1016c0,38 11,49 49,49l803 0 0 -1066 -853 0z"/>
                        </g><g id="sectorB19" data-toggle="tooltip" data-placement="top" title="Sektor B19">
                        <polygon class="fil2" points="10822,4655 10822,5720 11658,5720 11658,4655 "/>
                        </g><g id="sectorB20" data-toggle="tooltip" data-placement="top" title="Sektor B20">
                        <path class="fil2" d="M23003 4655l-426 0c0,552 33,313 -164,607 34,46 183,155 241,202 57,46 185,174 251,192l226 -217c156,109 223,250 332,250 38,0 49,-11 49,-49 0,-558 43,-409 -105,-600 -38,-50 -355,-384 -403,-384z"/>
                        </g><g id="sectorB21" data-toggle="tooltip" data-placement="top" title="Sektor B21">
                        <path class="fil2" d="M7690 5097l0 -443c-523,0 -403,-47 -668,217 -288,288 -234,118 -234,701 609,0 396,-37 623,115l397 -406c-23,-77 -119,-138 -119,-184z"/>
                        </g><g id="sectorB22" data-toggle="tooltip" data-placement="top" title="Sektor B22">
                        <path class="fil2" d="M23429 15377c-63,0 -234,205 -295,246l-201 -193c-34,22 -71,59 -113,92l-375 314c144,215 137,36 131,427 -3,183 -55,147 427,147 66,0 213,-198 258,-250 294,-334 250,-34 250,-783l-82 0z"/>
                        </g><g id="_648075552">
                            <path class="fil3" d="M21806 5819l-13362 0c-53,0 -408,180 -513,225 -45,19 -143,52 -143,103l0 8902c0,55 175,180 197,180l13870 0c34,0 93,-62 142,-103 48,-41 86,-72 133,-113l208 -169c30,-23 58,-27 58,-73l0 -8476c0,-50 -233,-213 -274,-250 -65,-58 -237,-225 -316,-225z"/>
                            <polygon class="fil3 str0" points="19461,8557 19461,12426 21560,12426 21560,11409 20822,11409 20822,9606 21560,9606 21560,8557 "/>
                            <path class="fil3 str0" d="M10608 8557l-1984 0c-38,0 -49,11 -49,49l0 951c0,38 11,49 49,49l656 0 0 1803 -656 0c-38,0 -49,11 -49,49l0 918c0,38 11,49 49,49l2033 0 0 -3820c0,-38 -11,-49 -49,-49z"/>
                            <polygon class="fil3 str0" points="20888,9655 20888,11360 21560,11360 21560,9655 "/>
                            <path class="fil3 str0" d="M8625 9655c-38,0 -49,11 -49,49l0 1607c0,38 11,49 49,49l607 0 0 -1705 -607 0z"/>
                            <path class="fil3 str0" d="M18849 10458c0,242 18,404 201,586 59,59 104,104 188,140 37,16 93,34 125,42 62,15 93,26 93,-30l0 -1377c-91,2 -174,37 -241,71 -193,96 -366,332 -366,569z"/>
                            <path class="fil3 str0" d="M10657 9819l0 1377c0,67 46,45 94,31 33,-9 87,-26 124,-42 70,-30 146,-97 196,-148 401,-417 129,-1206 -414,-1218z"/>
                            <path class="fil3 str0" d="M8497 10147l-197 0 0 705 246 0 0 -656c0,-38 -11,-49 -49,-49z"/>
                            <path class="fil3 str0" d="M21645 10147c-38,0 -49,11 -49,49l0 656 230 0 0 -705 -180 0z"/>
                            <path class="fil3 str0" d="M21249 14491l312 0 0 -279c-78,37 -132,23 -209,86 -56,45 -100,99 -102,193z"/>
                            <path class="fil3 str0" d="M8575 14229c0,325 -57,262 312,262 -35,-149 -128,-262 -312,-262z"/>
                            <path class="fil3 str0" d="M21249 6540c3,155 163,250 312,262l0 -262 -312 0z"/>
                            <path class="fil3 str0" d="M8575 6589c0,102 -41,334 192,143 71,-58 96,-93 119,-192 -157,0 -312,-30 -312,49z"/>
                            <line class="fil4 str0" x1="8575" y1="6589" x2="8575" y2= "8606" />
                            <line class="fil4 str0" x1="8575" y1="12377" x2="8572" y2= "14399" />
                            <line class="fil4 str0" x1="8887" y1="14491" x2="21249" y2= "14491" />
                            <line class="fil4 str0" x1="21560" y1="14213" x2="21560" y2= "12426" />
                            <line class="fil4 str0" x1="21560" y1="8557" x2="21560" y2= "6802" />
                            <line class="fil4 str0" x1="21249" y1="6540" x2="8887" y2= "6540" />
                            <line class="fil4 str0" x1="15068" y1="6540" x2="15068" y2= "14491" />
                            <path class="fil3 str0" d="M15080 9819l0 1377c0,67 46,45 94,31 33,-9 87,-26 124,-42 70,-30 146,-97 196,-148 401,-417 129,-1206 -414,-1218z"/>
                            <path class="fil3 str0" d="M14448 10458c0,242 18,404 201,586 59,59 104,104 188,140 37,16 93,34 125,42 62,15 93,26 93,-30l0 -1377c-91,2 -174,37 -241,71 -193,96 -366,332 -366,569z"/>
                        </g>
                        <g id="sectorA2" data-toggle="tooltip" data-placement="top" title="Sektor A2">
                        <path class="fil1" d="M4100 13049l0 2131 2574 0c38,0 49,-11 49,-49l0 -2082 -2623 0z"/>
                        </g><g id="sectorA3" data-toggle="tooltip" data-placement="top" title="Sektor A3">
                        <polygon class="fil1" points="4100,11458 4100,13000 6723,13000 6723,11458 "/>
                        </g><g id="sectorA4" data-toggle="tooltip" data-placement="top" title="Sektor A4">
                        <polygon class="fil1" points="4100,6475 4100,8016 6723,8016 6723,6475 "/>
                        </g><g id="sectorA5" data-toggle="tooltip" data-placement="top" title="Sektor A5">
                        <polygon class="fil1" points="4100,8065 4100,9589 6723,9589 6723,8065 "/>
                        </g><g id="sectorA6" data-toggle="tooltip" data-placement="top" title="Sektor A6">
                        <polygon class="fil1" points="4444,5179 4444,5786 4100,5786 4100,6425 6723,6425 6723,5179 "/>
                        </g>
                        <g id="sectorB24" data-toggle="tooltip" data-placement="top" title="Sektor B24">
                        <path class="fil2" d="M6788 7819c-38,0 -49,11 -49,49l0 1672c0,38 11,49 49,49l869 0c38,0 49,-11 49,-49l0 -1721 -918 0z"/>
                        </g><g id="sectorB25" data-toggle="tooltip" data-placement="top" title="Sektor B25">
                        <polygon class="fil2" points="6739,11458 6739,13213 7707,13213 7707,11458 "/>
                        </g><g id="sectorB26" data-toggle="tooltip" data-placement="top" title="Sektor B26">
                        <polygon class="fil2" points="6739,9639 6739,11393 7707,11393 7707,9639 "/>
                        </g><g id="sectorB27" data-toggle="tooltip" data-placement="top" title="Sektor B27">
                        <path class="fil2" d="M6739 13278l0 1607c0,38 11,49 49,49l869 0c38,0 49,-11 49,-49l0 -1607 -967 0z"/></g>
                        <path class="fil0" d="M6706 15442l-807 799c52,75 170,178 238,246l369 369c84,83 238,288 365,373l791 -783c-109,-4 -99,-23 -156,-82l-615 -615c-22,-22 -37,-35 -57,-58 -29,-33 -28,-41 -58,-73 -74,-81 -69,-31 -69,-177z"/>
                        <g id="sectorB28" data-toggle="tooltip" data-placement="top" title="Sektor B28">
                        <path class="fil2" d="M6739 6589l0 1131c0,38 11,49 49,49l869 0c38,0 49,-11 49,-49l0 -1131 -967 0z"/>
                        </g><g id="sectorB29" data-toggle="tooltip" data-placement="top" title="Sektor B29">
                        <path class="fil2" d="M7215 5606l-426 0c-38,0 -49,11 -49,49l0 836c0,38 11,49 49,49l869 0c38,0 49,-11 49,-49 0,-527 51,-367 -234,-652 -44,-45 -203,-234 -258,-234z"/>
                        </g><g id="sectorA7" data-toggle="tooltip" data-placement="top" title="Sektor A7">
                            <polygon class="fil1" points="4100,9639 4100,11409 5805,11409 5805,9639 "/>
                            <polygon class="fil1" points="6444,9639 6444,11409 6723,11409 6723,9639 "/>
                        </g>
                    </g>
</svg>
            </div>
        </div>
        <div class="col-md-12 ticket-details">

        </div>
    </div>

</main>

<footer class="container-fluid py-5 bg-primary text-white">
    <div class="container">
        <div class="row flex align-items-center">
            <div class="col-4 col-md">
                <img src="./img/logos/logo_white.png" class="img-fluid mx-auto d-block" />
            </div>
            <div class="col-4 col-md">
                <h5>Na skróty</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-white" href="#">Bilety i karnety</a></li>
                    <li><a class="text-white" href="#">Wydarzenia</a></li>
                    <li><a class="text-white" href="#">Zespół</a></li>
                    <li><a class="text-white" href="#">Historia</a></li>
                    <li><a class="text-white" href="#">Stadion</a></li>
                    <li><a class="text-white" href="#">Sponsorzy</a></li>
                    <li><a class="text-white" href="#">Relacje LIVE</a></li>
                </ul>
            </div>
            <div class="col-4 col-md">
                <h5>O stronie</h5>
                <ul class="list-unstyled text-small text-justify">
                    <li>Niniejsza strona stanowi witrynę poglądową wykonaną na potrzeby przedmiotu Projektowanie Systemów Internetowych i Mobilnych. Wszystkie zawarte na niej treści (tj. zdjęcia artykułów, dane prawcowników, treści artykułów) zostały pobrane z oficjalnej strony klubu.</li>
                </ul>
            </div>
            <div class="col-4 col-md">
                <h5>Dojazd na stadion</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <iframe class="shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2503.224162401674!2d16.941604916076027!3d51.14121727957661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fea8eaae5fd95%3A0xf0cefc8f160c790d!2sStadion%20Wroc%C5%82aw!5e0!3m2!1spl!2spl!4v1587730270178!5m2!1spl!2spl" width="360" height="230" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>




<script src="js/vendor/modernizr-3.8.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment-with-locales.min.js"></script>
<script src="js/equinox.js"></script>
<script src="js/plugins.js"></script>
<script src="js/tickets.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v6.0&appId=1884357361881732&autoLogAppEvents=1"></script>
</body>

</html>