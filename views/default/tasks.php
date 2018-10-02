<?php
//    $_cnt = new TaskController();
//    if(isset($_SESSION['filter'])) {
//        $tasks = $_cnt->getTasks($_SESSION['filter']);
//    }else {
//        $tasks = $_cnt->getTasks();
//    }
//    $organizationsCnt = new OrganizationController();
//    $organizations = $organizationsCnt->getOrganiztions();
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
                        <div class="toolbar__label">Ավելացնել Առաջադրանք </div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse m-top-minus-45px" aria-expanded="true" style="">
                        <form action="/tasks/set" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="task_doer" class="select-task-doer task_doer form-control">
                                                    <option required>Կատարող</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-sm-3">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="task_parent" class="select-task-parent task_parent form-control">
                                                    <option required>ընկերություն</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <textarea type="text" name="Task_description" class="Task_description form-control" rows="2" placeholder="Առաջադրանքի նկարագրութուն"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="work_price" class="work_price form-control" placeholder="գին">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" name="payment" class="payment form-control" placeholder="վճարում">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <textarea type="text" name="Task_Process" class="Task_Process form-control" rows="2" placeholder="Առաջադրանքի ընթացք"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                       <h2 class="form-title-date">վճարման օր</h2>
                                        <div class="form-group">
                                            <input type="date" name="payment_day" class="payment_day form-control" placeholder="վճարման օր">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <h2 class="form-title-date">սկսման ամսաթիվ</h2>
                                        <div class="form-group">
                                            <input type="date" name="work_start" class="work_start form-control" placeholder="սկսման ամսաթիվ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <h2 class="form-title-date">ավարտման ամսաթիվ</h2>
                                        <div class="form-group">
                                            <input type="date" name="work_end" class="work_end form-control" placeholder="ավարտման ամսաթիվ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="task_status col-sm-4">
                                        <h2 class="card-title m-bottom-8px">Առաջադրանքի ստատուս</h2> 
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="task_status" value="1" class="custom-control-input" checked>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ընթացքում է</span>
                                        </label>

                                        <div class="clearfix mb-2"></div>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="task_status" value="2" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">մոտենում է վերջնաժամկետը</span>
                                        </label>

                                        <div class="clearfix mb-2"></div>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="task_status" value="3" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">կատարված է</span>
                                        </label>
                                        <div class="clearfix mb-2"></div>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="task_status" value="4" class="custom-control-input">
                                            <span class="custom-control-indicator" ></span>
                                            <span class="custom-control-description">կատարված չէ</span>
                                        </label>
                                        <div class="clearfix mb-2"></div>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="task_status" value="5" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ժամանակավորապես դադարեցված է</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <textarea class="other_notes form-control" name="other_notes" rows="5" placeholder="Այլ նշումներ"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="add-task-js btn btn-success waves-effect">ավելացնել</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--            navbar        -->
                    <div class="navbar-block">
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ըստ կատարողի</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu select-task-doer-filter">
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?userid=0">բոլորը</a></li>
<!--                                         js ajax-->
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ընկերություններ</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu select-task-parent-filter">
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?orgid=0">բոլորը</a></li>
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
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=0">բոլորը</a></li>
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=1">ընթացքում է</a></li>
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=2">մոտենում է վերջնաժամկետը</a></li>
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=3">կատարված է</a></li>
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=4">կատարված չէ</a></li>
                                        <li><a class="dropdown-item filter-js" href="/tasks/filter?taskstatus=5">ժամանակավորապես դադարեցված է</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--            navbar        -->
                    <div class="tasks-wrapper">              
                        <div class="row card-block tasks">
<!--                        ajax js dont dalete-->
                    </div>
                    </div>
            </div>
        </section>
        <?php require "inc/footer.php" ?>

</body>

</html>