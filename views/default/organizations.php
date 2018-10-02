<?php
//    $organiztions = $_cnt->getOrganiztions();
//    $tasksCnt = new TaskController();    
//    $AdministrationsCnt = new AdministrationController();
//    $Administrations = $AdministrationsCnt->getUsers();
?>

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
                        <div class="toolbar__label">ավելացնել ընկերություն</div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse m-top-minus-45px" aria-expanded="true" style="">
                        <form action="/organizations/set" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="org_name" class="org_name form-control" placeholder="Կազմակերպություն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
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
                                            <input type="text" name="email" class="email form-control email" placeholder="էլ․փոստ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="address" class="address form-control" placeholder="հասցե">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="work_status" class="form-control">
                                                    <option>կագավիճակ</option>
                                                    <option value="current">ընթացիկ</option>
                                                    <option value="end">ավարտված</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="where_we_found" class="form-control">
                                                    <option>դիմելու վայրը</option>
                                                    <option value="facebook">facebook</option>
                                                    <option value="instagram">instagram</option>
                                                    <option value="vkontake">vkontake</option>
                                                    <option value="linkedin">linkedin</option>
                                                    <option value="tweeter">tweeter</option>
                                                    <option value="mailing">mailing</option>
                                                    <option value="calls">զանգեր</option>
                                                    <option value="network">կապեր</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <h2 class="form-title-date">դիմելու օր</h2>
                                        <div class="form-group">
                                            <input type="date" name="date_of_apply" class="date_of_apply form-control" placeholder="դիմելու օր">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="other_notes form-control" name="other_notes" rows="3" placeholder="այլ նշումներ"></textarea>
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
                                        <button type="submit"  class="add-org-js btn btn-success waves-effect">ավելացնել</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--        orders           -->

                    <div class="navbar-block">


                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ընկերություններ</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu select-org-org-filter">
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?orgid=0">բոլորը</a></li>
<!--                                        js ajax-->
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
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=0">բոլորը</a></li>
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=1">ընթացքում է</a></li>
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=2">մոտենում է վերջնաժամկետը</a></li>
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=3">կատարված է</a></li>
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=4">կատարված չէ</a></li>
                                        <li><a class="dropdown-item filterOrg-js" href="/organizations/filter?taskstatus=5">ժամանակավորապես դադարեցված է</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--        orders           -->
                     <div class="organizations-wrapper"> 
                        <div class="row card-block orders">
                        
                        </div>
                        <div class="modals-block"></div>
                    </div>
                </div>
            </section>
        <?php require "inc/footer.php" ?>
</body>

</html>