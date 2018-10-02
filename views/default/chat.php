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
            <h3>Chat</h3>
            

                <div class="listview listview--hover chat__buddies scrollbar-inner">
                    <a class="listview__item chat__available">
                        <img src="/public/material/demo/img/profile-pics/7.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Narek Pogosyan</div>
                            <p>hey, how are you doing.</p>
                        </div>
                    </a>

                    <a class="listview__item chat__available">
                        <img src="/public/material/demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Andranik Hovhanisyan</div>
                            <p>hmm...</p>
                        </div>
                    </a>

                    <a class="listview__item chat__away">
                        <img src="/public/material/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Anna atoyan</div>
                            <p>all good</p>
                        </div>
                    </a>

                    <a class="listview__item">
                        <img src="/public/material/demo/img/profile-pics/8.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>morbi leo risus portaac consectetur vestibulum at eros.</p>
                        </div>
                    </a>

                    <a class="listview__item">
                        <img src="/public/material/demo/img/profile-pics/6.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>fusce dapibus</p>
                        </div>
                    </a>

                    <a class="listview__item chat__busy">
                        <img src="/public/material/demo/img/profile-pics/9.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>cras mattis consectetur purus sit amet fermentum.</p>
                        </div>
                    </a>
                </div>

        </div>
    </section>
    <?php require "inc/footer.php" ?>
  </body>
</html>


