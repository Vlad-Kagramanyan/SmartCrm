<?php
    $_cnt = new CourseController();
    $courseCnt = $_cnt->getCourses();
    $studentCnt = new StudentController();
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
                        <div class="toolbar__label">ավելացնել դասընթաց</div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse" aria-expanded="true" style="">
                        <form action="courses/set" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-2">
                                       <h2 class="form-title-date">ժամը</h2>
                                        <div class="form-group">
                                            <input type="time" name="time" class="form-control" placeholder="ժամը">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                       <h2 class="form-title-date">սկսման ամսաթիվ</h2>
                                        <div class="form-group">
                                            <input type="date" name="course_start" class="form-control" placeholder="սկսման ամսաթիվ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="course_name" class="form-control">
                                                    <option>փուլ</option>
                                                    <option value="HTML/CSS/BOOTSTRAP">HTML/CSS/BOOTSTRAP</option>
                                                    <option value="JAVASCRIPT/JQUERY">JAVASCRIPT/JQUERY</option>
                                                    <option value="PHP/MYSQL">PHP/MYSQL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                       <h2 class="card-title">շաբաթվա օրեր</h2>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[երկ]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">երկ</span>
                                        </label>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[երք]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">երք</span>
                                        </label>
                                        
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[չրք]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">չրք</span>
                                        </label>
                                        
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[հնգ]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">հնգ</span>
                                        </label>
                                        
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[ուրբ]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ուրբ</span>
                                        </label>
                                        
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[շբթ]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">շբթ</span>
                                        </label>
                                        
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="week_day[կիր]" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">կիր</span>
                                        </label>
                                        
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success waves-effect">ավելացնել</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row card-block students">
                       <?php foreach($courseCnt as $course): ?>
                        <div class="card-demo col-md-4">
                            <div class="card red-border">
                                <div class="card-header">
                                    <h2 class="card-title"><?php echo $course['course_name'] ?></h2>
                                    <small class="card-subtitle"><?php echo $course['course_start'] ?></small>
                                    <small class="card-subtitle"><b>ժամ </b> <?php echo $course['time'] ?></small>
                                        <small class="card-subtitle"><b>օրեր </b> <?php foreach($course['week_day'] as $day => $val): ?>
                                            <?php echo $day ?>
                                           <?php endforeach; ?>
                                        </small>
                                    <small class="card-subtitle"></small>
                                    <div class="actions">
                                        <div class="dropdown actions__item">
                                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="/courses/delete?id=<?php echo $course['course_id'] ?>" class="dropdown-item">Ջնջել</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block-inner">
                                        
                                </div>
                                <div class="btn-demo">
                                    <button class="btn btn-secondary modal-op-order" data-toggle="modal" data-target="#modal-large_<?php echo $course['course_id'] ?>">կարդալ ավելին</button>
                                </div>
                            </div>
                        </div>
    
                        <div class="modal fade modal-course" id="modal-large_<?php echo $course['course_id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                       <?php $students =  $studentCnt->getStudents($course['course_id']); ?>
                                           <?php foreach($students as $student): ?> 
                                        <p class="modal-title"><?php echo $student['name_lastName'] ?></p><br/>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link">Save changes</button>
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