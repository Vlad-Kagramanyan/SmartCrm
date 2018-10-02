<!DOCTYPE html>
<html lang="en">

<head>
    <title>SmartCRM</title>
    <?php require "inc/head.php" ?>
</head>

<body>
    <?php require "inc/header.php" ?>
        <?php require "inc/sidebar.php" ?>
            <section class="content">
                <div class="content__inner">
                    <div class="navbar-block">
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">անալիտիկա</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">զանգերի կոնվերսիա</a></li>
                                        <li><a class="dropdown-item" href="#">պատվերների կոնվերսիա</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ժամանակահատված</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">օր</a></li>
                                        <li><a class="dropdown-item" href="#">շաբաթ</a></li>
                                        <li><a class="dropdown-item" href="#">ամիս</a></li>
                                        <li class="divider dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">կվարտալ</a></li>
                                        <li><a class="dropdown-item" href="#">տարի</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ֆիլտր</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">ավարտվածներ</a></li>
                                        <li><a class="dropdown-item" href="#">ժամկետանց</a></li>
                                        <li><a class="dropdown-item" href="#">չստացված պատվերներ</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="air" class="company-conversia"></div>
                </div>
            </section>
            <?php require "inc/footer.php" ?>

</body>

</html>