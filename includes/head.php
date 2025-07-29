<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $get->title ?></title>
    <meta name="description" content="<?= $get->desc ?>" />
    <meta name="keyw" content="<?= $get->keyw ?>" />
    <link rel="icon" href="<?= $get->assets_url.'/'.$get->favicon ?>" />
    <?= $theme->css_files ?>
    <?= $get->head_code ?>

</head>
<body>
<!-- <header id="header" class="header fixed-top " data-scrollto-offset="0" style="background-color:;"> -->
<header id="header" class="header fixed-top" data-scrollto-offset="0"
    style="<?= !$page ? '' : 'background-color: #00ace7;' ?>">


<div class="container d-flex align-items-center justify-content-between" >

    <a href="./" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->

        <!-- <img src="./assets/img/NewTemp/icon/logo.svg" alt="" style="height:30px"> -->
        <img src="<?= $get->assets_url.'/'.$get->logo ?>" alt="" style="max-height:100px">
        <!-- <h1>HeroBiz<span>.</span></h1> -->
    </a>

    <nav id="navbar" class="navbar navbar2" >
        <ul>
        <li class="nav-item navi-text" >
            <a class="nav-link   navi-text  px-2" href="./" > Home</a> 
        </li>
        <?php
                    foreach ($menus as $menu) {
                        echo '
                        <li class="nav-item navi-text ' . (count($menu->children) > 0 ? 'dropdown' : null) . ' ">
                            <a class="nav-link   navi-text  px-2 ' . (count($menu->children) > 0 ? 'dropdown-toggle' : null) . '   " href="' . ($menu->url ? './' . $menu->url : 'javascript:void(0)') . '">' . $menu->title . '</a>
                        ';
                        if ($menu->children) {
                            echo '<ul class="dropdown-menu " style="padding: 0">';
                            foreach ($menu->children as $children) {
                                echo '
                                <li>
                                    <a class="dropdown-item" href="./' . $children->url . '">' . $children->title . '</a>
                                </li>
                                ';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                    ?>
                <?php
                    if(!$get->blog == null){
                   echo  '<li class="nav-item navi-text " ><a class="nav-link   navi-text  px-2" href="./blog" >Blog</a></li>' ;
                   } ?>
        <li class="nav-item navi-text" >
            <a class="nav-link   navi-text  px-2" href="./contact-us" > Contact Us</a> 
        </li>

            
        </ul>
        <?php foreach ($extra_menus as $extra_top) { ?>
                                <?php if($extra_top->status  && $extra_top->show  && $extra_top->location === 'top') { ?>
                                <a href="<?= $extra_top->url ?>" class="p-2" style="background-color:<?= $extra_top->bg_color ?>; color:<?= $extra_top->text_color  ?> !important ; margin-right:7px !important; border-radius:0.25rem"> <?=$extra_top->title ?></a>
                                <?php } ?>
        <?php } ?>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>


    </nav><!-- .navbar -->

</div>

</header>
