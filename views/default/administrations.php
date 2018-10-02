
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
                    <div class="toolbar">
                        <div class="toolbar__label">ավելացնել աշխատակցի</div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse" aria-expanded="true" style="">
                        <form action="/administrations/set" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="position" class="position form-control" placeholder="պաշտոն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="name_lastName" class="name_lastName form-control" placeholder="անուն ազգանուն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="telephone" class="telephone form-control" placeholder="հեռախոս">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="email" class="email form-control" placeholder="էլ․փոստ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="password" class="password form-control" placeholder="գախտնաբառ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="salary" class="salary form-control" placeholder="աշխատավարձ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="messengers col-sm-6">
                                       <h2 class="card-title">մեսենջերներ</h2>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='viber' value="viber" checked class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">viber</span>
                                        </label>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='whatsapp' value="whatsapp" class=" custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">whatsapp</span>
                                        </label>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='telegram' value="telegram" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">telegram</span>
                                        </label>
                                    </div>
                                    <div class="social_networks col-sm-6">
                                        <h2 class="card-title">սոց ցանցեր</h2>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='facebook' value="facebook" checked class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">facebook</span>
                                        </label>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='vk' value="vk" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">vkontakte</span>
                                        </label>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='linkedin' value="linkedin" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">linkedin</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name='instagram' value="instagram" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">instagram</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="add-user-js btn btn-success waves-effect">ավելացնել</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--     navbar       -->

                    <div class="navbar-block">
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">պաշտոն</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu unique-position">
                                        <li><a class="dropdown-item filter-user-js" href="administrations/filter?position=0">բոլորը</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--     navbar       -->
                    <div class="administration-wraper">
                        <div class="row card-block administration">
<!--                               js ajax-->
                        </div>
                    </div>
                </div>
            </section>
            <?php require "inc/footer.php" ?>

</body>

</html>