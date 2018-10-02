<?php
//    $notes = $_cnt->getnotes();
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
                        <div class="toolbar__label">ավելացնել դիմողի</div>
                        <div class="actions">
                            <div class="actions__item">
                                <i class="zmdi zmdi-sort" data-toggle="collapse" data-target=".filter.collapse"></i>
                            </div>
                        </div>
                    </div>
                    <div class="filter collapse" aria-expanded="true" style="">
                        <form action="notes/set" method="POST">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="org_name" class="form-control org_name" placeholder="ընկերության անվանում">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="position" class="form-control position" placeholder="պաշտոն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="name_lastName" class="form-control name_lastName" placeholder="անուն">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="telephone" class="form-control telephone" placeholder="հեռախոս">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control email" placeholder="էլ․փոստ">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-group--select">
                                            <div class="select">
                                                <select name="where_we_found" class="form-control where_we_found">
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
                                    <div class="col-sm-3">
                                        <h2 class="form-title-date">դիմելու օր</h2>
                                        <div class="form-group">
                                            <input type="date" name="date_of_apply" class="form-control date_of_apply" placeholder="դիմելու օր">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="topic" class="form-control topic" rows="3" placeholder="թեմա"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control other_notes" name="other_notes"  rows="3" placeholder="այլ նշումներ"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="add-note-js btn btn-success waves-effect">ավելացնել</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card todo js-fill-notes">
                        <div class="card-header">
                            <small class="card-subtitle"></small>
                        </div>
<!--                    note items from ajax-->
                    </div>
                </div>
            </section>
            <?php require "inc/footer.php" ?>
</body>

</html>