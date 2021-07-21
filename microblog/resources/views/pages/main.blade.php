<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Микроблог</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script defer src="js/script.bundle.js"></script><link href="css/style.css" rel="stylesheet"></head>
<body>

<div class="wrapper">
    <div class="container wrapper-grey wrapper-margin">
        <header id="main-header">
            <div class="container m-auto p-0">
                <div class="row">
                    <hgroup class="main-header__title-group">
                        <h1 class="title-group__main-title"><a class="title-link" href="#">{ Микроблог }</a></h1>
                        <h2 class="title-group__sub-title">&#123;&#123; Просто еще один блог! }}</h2>
                    </hgroup>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg">
            <div class="container m-auto p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="#">[ Главная ]</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                [ Категории ]
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">[ Linux ]</a></li>
                                <li><a class="dropdown-item" href="#">[ Windows ]</a></li>
                                <li><a class="dropdown-item" href="#">[ Mac ]</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">[ О проекте ]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">[ Обратная связь ]</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="main-content">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div id="posts">
                        <div class="container m-0 p-0">
                            <div class="row">
                                <section class="post">
                                    <h3 class="title__post"><a href="#" class="link">{ Заголовок второго поста и еще раз длинного заголовка поста }</a></h3>
                                    <h4 class="subtitle__post">{ Категория: <a href="#" class="link">Категория 1</a>, Дата публикации:
                                        <a href="#" class="link"><time datetime="2021-07-07">07.07.2021</time></a> }</h4>
                                    <p class="text__post">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                    </p>
                                    <p class="tags__post">{ Теги: &#123;&#123; <a href="#" class="link">HTML</a> }}, &#123;&#123; <a
                                            href="#" class="link">PHP</a> }}, &#123;&#123; <a href="#" class="link">Bootstrap</a> }} }</p>
                                </section>
                                <section class="post">
                                    <h3 class="title__post"><a href="#" class="link">{ Заголовок первого поста }</a></h3>
                                    <h4 class="subtitle__post">{ Категория: <a href="#" class="link">Категория 1</a>, Дата публикации:
                                        <a href="#" class="link"><time datetime="2021-07-06">06.07.2021</time></a> }</h4>
                                    <p class="text__post">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                    </p>
                                    <p class="tags__post">{ Теги: &#123;&#123; <a href="#" class="link">HTML</a> }}, &#123;&#123; <a
                                            href="#" class="link">PHP</a> }}, &#123;&#123; <a href="#" class="link">Bootstrap</a> }} }</p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-xl-block col-xl-4 m-0 p-0">
                    <section id="category">
                        <div class="title__category">Категории блога:</div>
                        <ul class="items__category">
                            <li class="item__category">&gt; [ <a href="#" class="link">HTML</a> ]</li>
                            <li class="item__category">&gt; [ <a href="#" class="link">CSS</a> ]</li>
                            <li class="item__category">&gt; [ <a href="#" class="link">JS</a> ]</li>
                            <li class="item__category">&gt; [ <a href="#" class="link">PHP</a> ]</li>
                            <li class="item__category">&gt; [ <a href="#" class="link">MySQL</a> ]</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
        <footer class="container" id="main-footer">
            <div class="row">
                <small class="footer-line">&#123;&#123; &copy; 2021 Проект &nbsp;"<a href="#" class="footer-link">Микроблог</a>". }}</small>
            </div>
        </footer>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
