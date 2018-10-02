<?php
    $_cnt = new StudentController();
    $studentCnt = $_cnt->getStudents();
    $course_Cnt = new CourseController();
    $getCourses = $course_Cnt->getCourses();
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
                        <div class="toolbar__label">ավելացնել ուսանող</div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse" aria-expanded="true" style="">
                        <form action="/students/set" method="POST">
                            <div class="card">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="name_lastName" class="form-control" placeholder="անուն ազգանուն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="telephone" class="form-control" placeholder="հեռախոս">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="էլ․փոստ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="amount_to_be_pay" class="form-control" placeholder="վճարման ենթակա գումար">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="phase_graph" class="form-control">
                                                    <option>փուլ ու գրաֆիկ</option>
                                                    <?php foreach($getCourses as $course): ?>
                                                    <option value="<?php echo $course['course_id'] ?>"><b><?php echo $course['course_name'] ?></b>, 
                                                        <?php foreach($course['week_day'] as $day => $val) echo " ".$day ?>, <?php echo $course['time'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="student_status" class="form-control">
                                                    <option>ուսանողի կարգավիճակ</option>
                                                    <option value="ԳՐԱՆՑՎՈՂ">ԳՐԱՆՑՎՈՂ</option>
                                                    <option value="ՆԵՐԿԱ ՈՒՍԱՆՈՂ">ՆԵՐԿԱ ՈՒՍԱՆՈՂ</option>
                                                    <option value="ԱՎԱՐՏԱԾ ՈՒՍԱՆՈՂ">ԱՎԱՐՏԱԾ ՈՒՍԱՆՈՂ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="payment_status" class="form-control">
                                                    <option>վճարման կարգավիճակ</option>
                                                    <option value="վճարված է">վճարված է</option>
                                                    <option value="վճարված չէ">վճարված չէ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                            <input type="date" name="date_of_apply" class="form-control" placeholder="դիմելու օր">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <h2 class="form-title-date">վճարման օր</h2>
                                        <div class="form-group">
                                            <input type="date" name="date_of_pay" class="form-control" placeholder="վճարման օր">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="other_notes" rows="3" placeholder="այլ նշումներ"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success waves-effect">ավելացնել</button>
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
                                    <button type="button" class="btn btn-secondary">վճարման կարգավիճակ</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">վճարված է</a></li>
                                        <li><a class="dropdown-item" href="#">վճարված չէ</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">ուսանողի կարգավիճակ</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">գրանցվող</a></li>
                                        <li><a class="dropdown-item" href="#">ներկա ուսանող</a></li>
                                        <li><a class="dropdown-item" href="#">ավարտած ուսանող</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-item">
                            <div class="dropdown-demo">
                                <div class="btn-group" dropdown>
                                    <button type="button" class="btn btn-secondary">փուլ</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">1</a></li>
                                        <li><a class="dropdown-item" href="#">2</a></li>
                                        <li><a class="dropdown-item" href="#">3</a></li>
                                        <li class="divider dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--     navbar       -->
                    <div class="row card-block students">
                       <?php foreach($studentCnt as $student): ?>
                        <div class="card-demo col-md-4">
                            <div class="card red-border">
                                <div class="card-header">
                                    <h2 class="card-title"><?php echo $student['name_lastName'] ?></h2>
                                    <small class="card-subtitle"><?php $_course = $course_Cnt->getCourse($student['phase_graph']); ?>
                                     <?php echo $_course['course_name'] ?></small>
                                    <small class="card-subtitle"><?php echo $_course['course_start'] ?></small>
                                    <div class="actions">
                                        <div class="dropdown actions__item">
                                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="/students/delete?id=<?php echo $student['student_id'] ?>" class="dropdown-item">Ջնջել</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-demo">
                                    <button class="btn btn-secondary modal-op-order" data-toggle="modal" data-target="#modal-large_<?php echo $student['student_id'] ?>">կարդալ ավելին</button>
                                </div>
                            </div>
                        </div>
                       

                        <div class="modal fade modal-student" id="modal-large_<?php echo $student['student_id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="card-title"><?php echo $student['name_lastName'] ?></h2>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-subtitle"><?php echo $_course['course_name'] ?></p>
                                        <p class="card-subtitle"><?php echo $student['telephone'] ?></p>
                                        <p class="card-subtitle"><?php echo $student['email'] ?></p>
                                        <p class="card-subtitle"><?php echo $_course['course_start'] ?></p>
                                         <p class="card-subtitle"><?php echo $student['other_notes'] ?></p>
                                        <form action="">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn ">
                                                    <input type="radio" name="options" id="option1" autocomplete="off" value="">1-րդ փուլ
                                                </label>
                                                <label class="btn active">
                                                    <input type="radio" name="options" id="option3" autocomplete="off" value="" checked> 2-րդ փուլ
                                                </label>
                                                <label class="btn">
                                                    <input type="radio" name="options" id="option3" autocomplete="off" value=""> 3-րդ փուլ
                                                </label>
                                            </div>
                                        </form>
                                        <form action="">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn ">
                                                    <input type="radio" name="options" id="option1" autocomplete="off" value="գրանցվող">գրանցվող
                                                </label>
                                                <label class="btn active">
                                                    <input type="radio" name="options" id="option3" autocomplete="off" value="ներկա ուսանող"> ներկա ուսանող
                                                </label>
                                                <label class="btn">
                                                    <input type="radio" name="options" id="option3" autocomplete="off" value=" ավարտաց ուսանող"> ավարտաց ուսանող
                                                </label>
                                            </div>
                                        </form>
                                        <form action="">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn active">
                                                    <input type="radio" name="options" id="option1" autocomplete="off" value="վճարած է">վճարած է
                                                </label>
                                                <label class="btn">
                                                    <input type="radio" name="options" id="option3" autocomplete="off" value="վճարած չէ"> վճարած չէ
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="btn-demo">
                                        <button class="btn btn-secondary modal-op-order-level-2" data-toggle="modal" data-target="#modal-large1_<?php echo $student['student_id'] ?>">ֆինանսական հաշվետվություն</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-large1_<?php echo $student['student_id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title pull-left">ֆինանսական հաշվետվություն<br/></h5>
                                        <small class="card-subtitle">Վլադիմիր Կագրամանյան</small>
                                    </div>
                                    <div class="modal-body row">
                                        <table class=".table-bordered finance-table">
                                            <tr>
                                                <th class="">ամիս</th>
                                                <th class="">տարի</th>
                                                <th class="">ստացել է</th>
                                                <th class="">մնացորդ</th>
                                                <th class="">ստացման օր</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div class="form-group form-group--select">
                                                            <div class="select">
                                                                <select class="form-control">
                                                                    <option>հունվար</option>
                                                                    <option>փետրվար</option>
                                                                    <option>մարտ</option>
                                                                    <option>ապրիլ</option>
                                                                    <option>մայիս</option>
                                                                    <option>հունիս</option>
                                                                    <option>հուլիս</option>
                                                                    <option>օգոստոս</option>
                                                                    <option>սեպտեմբեր</option>
                                                                    <option>հոկտեմբեր</option>
                                                                    <option>նոյեմբեր</option>
                                                                    <option>դեկտեմբեր</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-8">
                                                        <div class="form-group form-group--select">
                                                            <div class="select">
                                                                <select class="form-control">
                                                                    <option>2018</option>
                                                                    <option>2019</option>
                                                                    <option>2020</option>
                                                                    <option>2021</option>
                                                                    <option>2022</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>150000</p>
                                                </td>
                                                <td>
                                                    <p>0</p>
                                                </td>
                                                <td>
                                                    <p>1</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php require "inc/footer.php" ?>

</body>

</html>