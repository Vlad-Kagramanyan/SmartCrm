$(document).ready(function () {
    $("body").on("click", ".toggle-todo",  function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().parent().find(".collapse-todo").slideToggle();
    });
    
    
    $(".todo__item").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
    });
    
//    login
    $(".login__block__btn").on('click', function (e) {
        e.preventDefault();
        var email = $(".email").val();
        var password = $(".password").val();
        var errors = $(".login_errors");
       if(email.length < 5) {
           errors.html("կարճ էլ․հասցե հասցե");
       }

        if(password.length < 4) {
               errors.html("գաղտնաբառը չի կարող լինել 5 նիշից պակաս");
           }
        if( email.length < 1 || password.length < 1) {
            errors.html("լրացրեք բոլոր դաշտերը");
        }
        
            if(email.length > 5 && password.length > 4) {
                errors.html("");
                $.ajax({
                    type: "POST", 
                    url: "/administrations/login",
                    data: {email: email, password: password},
                    success: function (msg) {
                        var data = JSON.parse(msg);
                        if(data.errors.length > 0) {
                            errors.html(data.errors);
                        }
                        if(!data.location == false) {
                            window.location.assign(data.location);
                        }
                    }
                });
           }
            
    });
    
//    check chchekbox
    function getChecked(el) {
            var arr = [];
            for (var i = 0; i < el.length; i++) {
                if($(el[i]).is(":checked")) {
                    arr.push(el[i].value);
                }else {
                    continue;
                }
            }
            return arr;
        }
//    check chchekbox
     function getCheckedRadio(el) {
            var arr;
            for (var i = 0; i < el.length; i++) {
                if($(el[i]).is(":checked")) {
                    arr = el[i].value;
                }else {
                    continue;
                }
            }
            return arr;
        }
    
    
    
    
    
    
//    notes ////////////////////////////////
    
    function Note() {}
    
    Note.prototype.deleteNote = function (e) {
        e.preventDefault();
        var noteEl = $(this).parent().parent().parent().parent();
        var id = $(this).attr("data-id");
        $.ajax({
            type: "GET", 
            url: "/notes/delete?id="+id,
            success: function () {
                noteEl.remove();
            }
        })
    }
    
    Note.prototype.addNote = function (e) {
        e.preventDefault();
        var postData = {org_name: $(".org_name").val(), position : $(".position").val(), name_lastName : $(".name_lastName").val(),
            telephone : $(".telephone").val(), email : $(".email").val(), where_we_found : $(".where_we_found").val(),
            date_of_apply : $(".date_of_apply").val(), topic : $(".topic").val(),  other_notes : $(".other_notes").val()
        };
        
        $(".org_name").val(""); $(".position").val(""); $(".name_lastName").val(""); $(".telephone").val(""); 
        $(".email").val(""); $(".where_we_found").val(""); $(".date_of_apply").val(""); $(".topic").val("");  $(".other_notes").val("");
        $(".filter.collapse").removeClass("show");
        
        $.ajax({
            type: "POST", 
            url: "/notes/set",
            data: postData,
            beforeSend: function( xhr ) {
                $(".note-items-js").remove();
            },
            success: note.getNotes
        });
    }
    
    Note.prototype.notePagination = function (e) {
        e.preventDefault();
        var num = $(this).attr("data-page");
        $.ajax({
            type: "POST", 
            url: "/notes",
            data: {page: num},
            success: note.template
        });
    }
    
    Note.prototype.getNotes = function () {
        $.ajax({
            type: "POST", 
            url: "/notes",
            success: note.template
        });
    }
    
    Note.prototype.template = function (msg) {
        $(".js-fill-notes").html("");
            var data = JSON.parse(msg);
            var list = "";
            $.each(data, function(key, value) {
                if(key != "count") { 
                   list += '<div class="listview__item note-items-js">';
                        list += '<label class="custom-control custom-control--char todo__item">';
                            list += '<input class="custom-control-input" type="checkbox" value="">';
                            list += '<span class="custom-control--char__helper"><i class="bg-lime">'+value.org_name.substr(0, 1)+'</i></span>';
                            list += '<div class="todo__info">';
                               list += '<span>'+value.org_name+'</span>';
                               list += '<small>'+value.position+'</small>';
                               list += '<div class="collapse-todo">';
                                   list += '<p></p>';
                                   list += '<p>Tel: <span>+'+value.telephone+'</span>';
                                       list += '<br><span>E-mail: '+value.email+'</span></p>';
                                   list += '<p>'+value.other_notes+'</p>';
                                   list += '<p>'+value.topic+'</p>';
                                   list += '<p>'+value.date_of_apply+'</p>';
                               list += '</div>';
                           list += '</div>';
                            list += '<div class="listview__attrs">';
                                list += '<span class="toggle-todo">կարդալ ավելին</span>';
                            list += '</div>';
                        list += '</label>';
                       list += '<div class="actions listview__actions">';
                           list += '<div class="dropdown actions__item">';
                               list += '<i class="zmdi zmdi-more-vert" data-toggle="dropdown"></i>';
                               list += '<div class="dropdown-menu dropdown-menu-right">';
                                   list += '<a class="dropdown-item delete-note-js" data-id="'+value.note_id+'" href="/notes/delete?id='+value.note_id+'">Ջնջել</a>';
                                list +='</div>';
                           list += '</div>';
                       list += '</div>';
                    list += '</div>';
                }
            });
            var block = "";
            block += '<ul class="pagination note">';
            for(var i = 1; i <= data.count; i++) {
                block += '<li>';
                block += '<a href="notes/?page='+i+'" data-page="'+i+'">'+i+'</a>';
                block += '</li>';
            }
            block += '</ul>';
            $(".js-fill-notes").append(list);
            $(".js-fill-notes").append(block);
        }
    
    var note = new Note();
    
    
//    add note
    $("body").on("click", ".delete-note-js", note.deleteNote);
//    delete note
    $(".add-note-js").on("click", note.addNote);
//    pagintaion note
    $("body").on("click", ".pagination.note a", note.notePagination)
//    notes//////////////////////////
    
    
    
    
    
    
    
    //administration //////////////////////
    
    function User() {}
    
    User.prototype.deleteUser = function (e) {
        e.preventDefault();
        var noteEl = $(this).parent().parent().parent().parent().parent().parent();
        var path = $(this).attr("href");
        $.ajax({
            type: "GET",
            contentType: 'application/json',
            url: path,
            success: user.getUsers
        });
    }
    
    User.prototype.addUser = function (e) {
        e.preventDefault();
        var checkboxMessenger = $(".messengers").find("input[type='checkbox']");
        
        var checkMessengers = getChecked(checkboxMessenger);
        
        var checkboxSoc_network = $(".social_networks").find("input[type='checkbox']");
        var checksocial_networks = getChecked(checkboxSoc_network);
        
        var postData = { position : $(".position").val(), name_lastName : $(".name_lastName").val(),
            telephone : $(".telephone").val(), email : $(".email").val(), 
            password : $(".password").val(),  salary : $(".salary").val(), messengers : checkMessengers,
            social_networks : checksocial_networks
        };

        $(".position").val(""); $(".name_lastName").val(""); $(".telephone").val(""); $(".email").val(""); 
        $(".password").val(""); $(".salary").val("");
        $(".filter.collapse").removeClass("show");
        
        $.ajax({
            type: "POST", 
            url: "/administrations/set",
            data: postData,
            success: user.getUsers
        });
    }
    
    User.prototype.getUsers = function (callback) {
        if(callback) {
            $.ajax({
                type: "POST", 
                url: "/administrations",
                contentType: "application/json",
                success: callback
            });
        }else {
            $.ajax({
                type: "POST", 
                url: "/administrations",
                contentType: "application/json",
                success: user.userTemplate
            });
        }
    }
    
    User.prototype.getAllUsers = function (callback) {
            $.ajax({
                type: "POST", 
                url: "/administrations",
                data: {all: "all"},
                success: callback
            }); 
    }
        
    User.prototype.userTemplate = function (msg) {
        $(".card-block.administration").html("");
        $(".pagination.users").remove();
        var data = JSON.parse(msg);
        var list = "";
        $.each(data, function(key, value) {
            if(key != "count") { 
                list += '<div class="card-demo col-md-4">';
                    list += '<div class="card">';
                        list += '<div class="card-header">';
                            list += '<h2 class="card-title">'+value.name_lastName+'</h2>';
                            list += '<small class="card-subtitle">'+value.position+'</small>';
                            list += '<small class="card-subtitle">'+value.telephone+'</small>';
                            list += '<div class="actions">';
                                list += '<div class="dropdown actions__item">';
                                    list += '<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>';
                                    list += '<div class="dropdown-menu dropdown-menu-right">';
                                        list += '<a href="/administrations/delete?id='+value.user_id+'" class="delete-user-js dropdown-item">Ջնջել</a>';
                                    list += '</div>';
                                list += '</div>';
                            list += '</div>';
                        list += '</div>';
                        list += '<div class="card-block-inner"></div>';
                        list += '<div class="btn-demo">';
                            list += '<button class="btn btn-secondary modal-op-order" data-toggle="modal" data-target="#modal-large_'+value.user_id+'">կարդալ ավելին</button>';
                        list += '</div>';
                        list += '<div class="file-upload">';
                            list += '<label>';
                                list += '<input type="file" name="file">';
                                list += '<span>ընտրեք նկարը</span>';
                            list += '</label>';
                        list += '</div>';
                    list += '</div>';
               list += '</div>';
                  
                list +='<div class="modal fade" id="modal-large_'+value.user_id+'" tabindex="-1">';
                    list += '<div class="modal-dialog modal-lg">';
                        list += '<div class="modal-content">';
                            list += '<div class="modal-header">';
                                list += '<h2 class="card-title">'+value.name_lastName+'</h2>';
                            list += '</div>';
                            list += '<div class="modal-body">';
                            list += '<p>'+value.position+'</p>';
                                list += '<p>'+value.email+'</p>';
                                list += '<p>'+value.salary+'</p>';
                                list += '<p>'+value.telephone+' ';
//                                        messenger items
                                        $.each(JSON.parse(value.messengers), function(key_2, value_2) {
                                            list += '<a href="#">';
                                                list += '<i class="fab fa-'+value_2+'"></i>';
                                            list += '</a>';
                                        });
                                list += '</p>';
                                list += '<p>';
//                                        soc items 
                                        $.each(JSON.parse(value.social_networks), function(key_2, value_2) {
                                            list += '<a href="#">';
                                              list += '<i class="zmdi zmdi-'+value_2+'"></i>';
                                           list += '</a>'; 
                                        });
                                list += '</p>';
                            list += '</div>';
//                            list += '<div class="btn-demo">';
//                                list += '<button class="btn btn-secondary modal-op-order-level-2" data-toggle="modal" data-target="#modal-large1_'+value.user_id+' ?>">ֆինանսական հաշվետվություն</button>';
//                            list += '</div>';
                            list += '<div class="modal-footer">';
                               list += ' <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>';
                            list += '</div>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>'; 
            }
        });
        var block = "";
        block += '<ul class="pagination users">';
        for(var i = 1; i <= data.count; i++) {
            block += '<li>';
            block += '<a href="administrations/?page='+i+'" data-page="'+i+'">'+i+'</a>';
            block += '</li>';
        }
        block += '</ul>';
        $(".card-block.administration").append(list);
        $(".administration-wraper").append(block);
        
    }
    
    User.prototype.userPagination = function (e) {
        e.preventDefault();
        var num = $(this).attr("data-page");
        $.ajax({
            type: "POST", 
            url: "/administrations",
            data: {page: num},
            success: user.userTemplate
        });
    }
    
    User.prototype.getUser = function (id, callback) {
        var ajaxData;
        $.ajax({
            type: "POST",
            url: "/administrations/getuser",
            data: {id: id},
            success: callback
        });
    }
    
    User.prototype.getUniqueUser = function () {
        $.ajax({
            type: "GET",
            url: "/administrations/getuniqueuser",
            success: function (msg) {
                var data = JSON.parse(msg);
                var list = "";
                $.each(data, function(key, value){
                    list += '<li><a class="dropdown-item filter-user-js" href="administrations/filter?position='+value+'">'+value+'</a></li>'
                });
                $(".unique-position").append(list);
                
            }
        });
    }
    
    getUserSync = function (id) {
        var jqxhr =  $.ajax({
            type: "POST", 
            url: "/administrations/getuser",
            data: {id: id},
            async: false
        });
        var response = JSON.parse(jqxhr.responseText);
        return response;
    }
    
    
    var user = new User();
    
    function filterUser (e) {
        e.preventDefault();
        var path = $(this).attr("href");
        $.ajax({
            url: path,
            success: user.userTemplate
        });
    }
    
    var userid = $(".user__name").data("id");
    
    
    function profile (msg) {
        var data = JSON.parse(msg);
        $(".user__name").html(data.name_lastName);
        $(".user__email").html(data.email);
    }
    
    user.getUser(userid, profile);
    
    function get(msg) {
        ajaxData = JSON.parse(msg); 
        console.log(ajaxData);
    }
    
    $("body").on("click", ".filter-user-js", filterUser);
        
    $("body").on("click", ".pagination.users a", user.userPagination);
    
    $("body").on("click", ".delete-user-js", user.deleteUser);
    
    $(".add-user-js").on("click", user.addUser);

//    administration //////////////////////
    

    
//    tasks//////////////////////
    
    function Task() {}
    
    Task.prototype.deleteTask = function (e) {
        e.preventDefault();
        var path = $(this).attr("href");
        $.ajax({
            type: "GET",
            url: path,
            success: task.getTasks
        });
    }
    
    Task.prototype.getTasks = function () {
        $.ajax({
            type: "POST", 
            url: "/",
            data: {userid: 0, taskstatus: 0},
            success: task.taskTemplate
        });
    }
    
    Task.prototype.taskTemplate = function (msg) { 
        var data = JSON.parse(msg);
        $(".card-block.tasks").html("");
        $(".pagination.tasks").remove();
        var list = "";
        var status;
        var user;
        var org;
        $.each(data, function(key, value) { 
            if(key != "count") { 
                status = getStatusWork(value.task_status);
                user = getUserSync(value.task_doer);
                org = getOrgSynq(value.task_parent);
                list += '<div class="card-demo col-md-4">';
                    list += '<div class="card aqua-border">';
                        list += '<div class="card-header">';
                            list += '<h2 class="card-title">'+org.org_name+'</h2>';
                            list += '<small class="card-subtitle">'+user.name_lastName+'</small>';
                            list += '<small class="card-subtitle">'+value.task_description+'</small>';
                            list += '<small class="card-subtitle">'+status.status_name+'</small>';
                            list += '<div class="actions">';
                                list += '<div class="dropdown actions__item">';
                                    list += '<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>';
                                    list += '<div class="dropdown-menu dropdown-menu-right">';
                                        list += '<a href="/tasks/delete?id='+value.task_id+'" class="delete-task-js dropdown-item">Ջնջել</a>';
                                    list += '</div>';
                                list += '</div>';
                            list += '</div>';
                        list += '</div>';
                        list += '<div class="btn-demo">';
                            list += '<button class="btn btn-secondary modal-op-order" data-toggle="modal" data-target="#modal-large_'+value.task_id+'">կարդալ ավելին</button>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>';
                
                list += '<div class="modal fade" id="modal-large_'+value.task_id+'" tabindex="-1">';
                    list += '<div class="modal-dialog modal-lg">';
                        list += '<div class="modal-content">';
                            list += '<div class="modal-header">';
                                list += '<h2 class="modal-title">'+user.name_lastName+'</h2>';
                            list += '</div>';
                            list += '<div class="modal-body">';
                                list += '<h2 class="card-title">ԿԱԶՄԱԿԵՐՊՈՒԹՅՈՒՆ</h2>';
                                list += '<p>'+org.org_name+'</p>';
                                list += '<h2 class="card-title">ԱՌԱՋԱԴՐԱՆՔ</h2>';
                                list += '<p>'+value.task_description+'</p>';
                                list += '<h2 class="card-title">ԺԱՄԿԵՏ</h2>';
                                list += '<p>'+value.work_start+' - ' +value.work_end+'</p>';
                                list += '<h2 class="card-title">Առաջադրանքի նկարագրութուն</h2>';
                                list += '<p>'+value.task_description+'</p>';
                            if(value.task_Process) {
                                list += '<h2 class="card-title">Առաջադրանքի ընթացք</h2>';
                                list += '<p>'+value.task_Process+'</p>';
                            }
                            if(value.other_notes) {
                                list += '<h2 class="card-title">ՆՇՈՒՄՆԵՐ</h2>';
                                list += '<p>'+value.other_notes+'</p>';  
                            }
                            list += '</div>';
                            list += '<div class="modal-footer">';
                                list += '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>';
                            list += '</div>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>';
            }
        });
        var block = "";
        block += '<ul class="pagination tasks">';
        for(var i = 1; i <= data.count; i++) {
            block += '<li>';
            block += '<a href="/?page='+i+'" data-page="'+i+'">'+i+'</a>';
            block += '</li>';
        }
        block += '</ul>';
        $(".card-block.tasks").append(list);   
        $(".tasks-wrapper").append(block);
        if(data.count == 0) {
            $(".pagination.tasks").append(`<p style="font-size: 22px; padding: 25px 0 25px 0">առաջադրանքներ չկան</p>`);
        }
    }
    
    Task.prototype.addTask = function (e) {
        e.preventDefault();
        var checkboxMessenger = $(".task_status").find("input[type='radio']");
        
        var task_status_val = getCheckedRadio(checkboxMessenger);
        
        var postData = { task_doer : $(".task_doer").val(), task_parent : $(".task_parent").val(),
            Task_description : $(".Task_description").val(), work_price : $(".work_price").val(), 
            payment : $(".payment").val(), payment_day : $(".payment_day").val(), Task_Process : $(".Task_Process").val(), 
            work_start : $(".work_start").val(), work_end : $(".work_end").val(), task_status : task_status_val, other_notes: $(".other_notes").val()
        };
        

        $(".task_doer").html(""); $(".task_doer").append("<option required>Կատարող</option>");
        $(".task_parent").html(""); $(".task_parent").append("<option required>ընկերություն</option>");
        $(".Task_description").val(""); $(".work_price").val(""); $(".Task_Process").val(""); $(".work_start").val("");
        $(".work_end").val(""); $(".other_notes").val(""); $(".payment").val(""); $(".payment_day").val("");
        $(".filter.collapse").removeClass("show");
        
        $.ajax({
            type: "POST", 
            url: "/set",
            data: postData,
            success: task.getTasks
        });
    }
    
    Task.prototype.taskPagination = function (e) {
        e.preventDefault();
        var num = $(this).attr("data-page");
        $.ajax({
            type: "POST", 
            url: "/",
            data: {page: num},
            success: task.taskTemplate
        });
    }
    
    
    var task = new Task();
    
    function filter (e) {
        e.preventDefault();
        var path = $(this).attr("href");
        $.ajax({
            url: path,
            success: task.taskTemplate
        });
    }
//    get users for filter and selects
    function getUsersForTasks(msg) {
        var data = JSON.parse(msg);
        var list = "";
        var list_2 = "";
        $.each(data, function(key, value) {
            if(key != "count") {
                list += '<option value="'+value.user_id+'">'+value.name_lastName+'</option>';
                list_2 += '<li><a class="dropdown-item filter-js" href="/tasks/filter?userid='+value.user_id+'">'+value.name_lastName+'</a></li>';
            }
        });
        $(".select-task-doer").append(list);
        $(".select-task-doer-filter").append(list_2);
    }
    
    function getOrgForTasks(msg) {
        var data = JSON.parse(msg);
        var list = "";
        var list_2 = "";
        $.each(data, function(key, value) {
            if(key != "count") {
                list += '<option value="'+value.organization_id+'">'+value.org_name+'</option>';
                list_2 += '<li><a class="dropdown-item filter-js" href="/tasks/filter?orgid='+value.organization_id+'">'+value.org_name+'</a></li>';
            }
        });
        $(".select-task-parent").append(list);
        $(".select-task-parent-filter").append(list_2);
    }
//    get status work proccess per id
    function getStatusWork(id) {
        var jqxhr =  $.ajax({
            type: "POST", 
            url: "/status",
            data: {id: id},
            async: false
        });
        var response = JSON.parse(jqxhr.responseText);
        return response;
    }

    $("body").on("click", ".filter-js", filter);
    
    $("body").on("click", ".delete-task-js", task.deleteTask);
    
    $(".add-task-js").on("click", task.addTask);
    
    $("body").on("click", ".pagination.tasks a", task.taskPagination);
    
//    tasks///////////////////////
    
    
    
    
    
    
//    organizations////////////
    function Organizations() {}
    
    Organizations.prototype.getOrganizations = function () {
            $.ajax({
                type: "POST", 
                url: "/organizations",
                success: org.orgTemplate
             }); 
    }
                  
    Organizations.prototype.getAllOrganizations = function (callback) {
            $.ajax({
                type: "POST", 
                url: "/organizations",
                data: {all: "all"},
                success: callback
            }); 
    }
    
    Organizations.prototype.getOrganization = function (id, callback) {
        $.ajax({
            type: "POST", 
            url: "/organizations/getorganization",
            data: {id: id},
            success: callback
        });
    }
    
    Organizations.prototype.getOrgTasks = function (id, callback) {
        $.ajax({
            type: "POST", 
            url: "/organizations/getorganizationtasks",
            data: {id: id},
            success: callback
        });
    }
    
    Organizations.prototype.addOrganization = function (e) {
        e.preventDefault();
        var checkboxMessenger = $(".messengers").find("input[type='checkbox']");
        
        var checkMessengers = getChecked(checkboxMessenger);
        
        var checkboxSoc_network = $(".social_networks").find("input[type='checkbox']");
        var checksocial_networks = getChecked(checkboxSoc_network);
        
        var postData = { org_name : $(".org_name").val(), position : $(".position").val(), name_lastName : $(".name_lastName").val(),
            telephone : $(".telephone").val(), email : $(".email").val(), 
            work_status : $(".work_status").val(),  where_we_found : $(".where_we_found").val(),
            date_of_apply : $(".date_of_apply").val(), other_notes : $(".other_notes").val(), address : $(".address").val(),
            messengers : checkMessengers, social_networks : checksocial_networks
        };
        
        $(".org_name").val(""); $(".position").val(""); $(".name_lastName").val(""); $(".telephone").val(""); $(".email").val(""); 
        $(".other_notes").val(""); $(".address").val("");
        $(".filter.collapse").removeClass("show");
        
        $.ajax({
            type: "POST", 
            url: "/organizations/set",
            data: postData,
            success: org.getOrganizations
        });
    }
      
    Organizations.prototype.orgTemplate = function (msg) {
        var data = JSON.parse(msg);
        $(".card-block.orders").html("");
        $(".pagination.organizations").remove();
        var list = "";
        $.each(data, function(key, value){
            if(key != "count") { 
               list += '<div class="card-demo col-md-4">';
                    list += '<div class="card ">';
                        list += '<div class="card-header">';
                            list += '<h2 class="card-title">'+value.org_name+'</h2>';
                            list += '<small class="card-subtitle inline">'+value.telephone+'';
                                $.each(JSON.parse(value.messengers), function(key_2, value_2) {
                                    list += '<a href="#">';
                                        list += '<i class="fab fa-'+value_2+'"></i>';
                                    list += '</a>';
                                });
                            list += '</small>';
                            list += '<br/>';
                            list += '<small class="card-subtitle inline">'+value.email+'</small>';
                            list += '<small class="card-subtitle"><p>';
                                $.each(JSON.parse(value.social_networks), function(key_2, value_2) {
                                    list += '<a href="#">';
                                      list += '<i class="zmdi zmdi-'+value_2+'"></i>';
                                   list += '</a>'; 
                                });
                            list += '</p></small>';
                            list += '<div class="actions">';
                                list += '<div class="dropdown actions__item">';
                                    list += '<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>';
                                    list += '<div class="dropdown-menu dropdown-menu-right">';
                                        list += '<a href="/organizations/delete?id='+value.organization_id+'" class="delete-org-js dropdown-item">Ջնջել</a>';
                                    list += '</div>';
                                list += '</div>';
                            list += '</div>';
                        list += '</div>';
                        list += '<div class="btn-demo">';
                            list += '<button class="btn btn-secondary modal-op-order" data-id="'+value.organization_id+'"  data-toggle="modal" data-target="#modal-large_'+value.organization_id+'">կարդալ ավելին</button>';
                        list += '</div>';
                    list += '</div>';
                list += '</div>'; 
            }
        });
        var block = "";
        block += '<ul class="pagination organizations">';
        for(var i = 1; i <= data.count; i++) {
            block += '<li>';
            block += '<a href="/?page='+i+'" data-page="'+i+'">'+i+'</a>';
            block += '</li>';
        }
        block += '</ul>'; 
        $(".card-block.orders").append(list);
        $(".organizations-wrapper").append(block);
        if(data.count == 0) {
            $(".pagination.organizations").append(`<p style="color: white; font-size: 22px; padding: 25px 0 25px 0">ընկերություններ չկան</p>`);
        }
    }
    
    Organizations.prototype.deleteOrg = function (e) {
        e.preventDefault();
        var noteEl = $(this).parent().parent().parent().parent().parent().parent();
        var path = $(this).attr("href");
        $.ajax({
            type: "GET",
            contentType: 'application/json',
            url: path,
            success: org.getOrganizations
        });
    }
    
    Organizations.prototype.orgModalsTemplate = function (msg) {
        var data = JSON.parse(msg);
        var modal = "";
        modal += '<div class="modal fade" id="modal-large_'+data.organization_id+'" tabindex="-1">';
            modal += '<div class="modal-dialog modal-lg">';
                modal += '<div class="modal-content orders-modals p-bottom-60px">';
                    modal += '<div class="modal-content-flex">';
                        modal += '<div>';
                            modal += '<h2 class="card-title">'+data.org_name+'</h2>';
                            modal += '<h5 class="card-title">'+data.position+'</h5>';
                            modal += '<h5 class="card-title">'+data.name_lastName+'</h5>';
                        if(data.other_notes) {
                            modal += '<h5 class="card-title">'+data.other_notes+'</h5>';
                        }
                        modal += '</div>';
                        modal += '<div>';
                            modal += '<h2 class="card-title">կոնտակտներ</h2>';
                            modal += '<p>'+data.email+'</p>';
                            modal += '<p></p>';
                            modal += '<p>'+data.telephone+'';
                                $.each(JSON.parse(data.messengers), function(key_2, value_2) {
                                    modal += '<a href="#">';
                                        modal += '<i class="fab fa-'+value_2+'"></i>';
                                    modal += '</a>';
                                });  
                            modal += '</p>';
                            modal += '<p>';
                                $.each(JSON.parse(data.social_networks), function(key_2, value_2) {
                                    modal += '<a href="#">';
                                      modal += '<i class="zmdi zmdi-'+value_2+'"></i>';
                                   modal += '</a>'; 
                                });
                            modal += '</p>';
                        if(data.address) {
                            modal += '<p>'+data.address+'</p>';
                        }
                        modal += '</div>';
                        modal += '<div>';
                            modal += '<h2 class="card-title">իրավաբանական տվյալներ</h2>';
                            modal += '<div class="btn-demo">';
                                modal += '<button class="btn btn-secondary modal-op-order-level-2" data-id="'+data.organization_id+'" data-toggle="modal" data-target="#modal-large1_'+data.organization_id+'">պատվերներ և ֆինանսական հաշվետվություն</button>';
                            modal += '</div>';
                            modal += '<div class="modal-footer absolute-close">';
                                modal += '<button type="button" class="btn btn-link close" data-dismiss="modal">Close</button>';
                            modal += '</div>';
                        modal += '</div>';
                    modal += '</div>';
                modal += '</div>';
            modal += '</div>';
        modal += '</div>';
        $(".modals-block").append(modal);
        $("#modal-large_"+data.organization_id).addClass("show").toggle(); 
    }
    
    Organizations.prototype.orgModal_2_Template = function (msg) {
        var data = JSON.parse(msg);
        var org_id = (data.task_parent != undefined) ? data.task_parent : data[0].task_parent;
        var modal = "";
        var status = "";
        modal += '<div class="modal fade modal-l " id="modal-large1_'+org_id+'" tabindex="-1">';
            modal += '<div class="modal-dialog modal-lg">';
                modal += '<div class="modal-content ">';
                    modal += '<div class="modal-header">';
                        modal += '<h5 class="modal-title pull-left">պատվեր<br/></h5>';
                    modal += '</div>';
            if(data.task_parent == undefined) {     
                $.each(data, function (key, val) {
                    status = getStatusWork(val.task_status);
                    modal += '<div class="modal-body row">';
                    modal += '<div class="modal-header">';
                        modal += '<h5 class="modal-title pull-left">ընթացք<br/></h5>';
                    modal += '</div>';
                        modal += '<table class=".table-bordered finance-table">';
                            modal += '<tr>';
                                modal += '<th class="">կարգավիճակ</th>';
                                modal += '<th class="">նկարագրություն</th>';
                                modal += '<th class="">ժամկետ</th>';
                                modal += '<th class="">գին</th>';
                            modal += '</tr>';
                            modal += '<tr>';
                                modal += '<td>'+status.status_name+'</td>';
                                modal += '<td>'+val.task_description+'</td>';
                                modal += '<td>'+val.work_end+'</td>';
                                modal += '<td>'+val.work_price+'</td>';
                            modal += '</tr>';
                        modal += '</table>';
                        modal += '<div class="modal-header">';
                            modal += '<h5 class="modal-title pull-left">ֆինանսական հաշվետվություն<br/></h5>';
                        modal += '</div>';
                        modal += '<table class=".table-bordered finance-table">';
                            modal += '<tr>';
                                modal += '<th class="">արժեք</th>';
                                modal += '<th class="">վճարված </th>';
                                modal += '<th class="">մնացորդ</th>';
                                modal += '<th class="">վճարման գրաֆիկ</th>';
                            modal += '</tr>';
                            modal += '<tr>';
                                modal += '<td>'+val.work_price+'</td>';
                                modal += '<td>'+val.payment+'</td>';
                                var total = (parseInt(val.work_price) - parseInt(val.payment));
                                modal += '<td>'+total+'</td>';
                                modal += '<td>'+val.payment_day+'</td>';
                            modal += '</tr>';
                        modal += '</table>';
                    modal += '</div>';
                });
            }else {
                status = getStatusWork(data.task_status);
                modal += '<div class="modal-body row">';
                        modal += '<div class="modal-header">';
                            modal += '<h5 class="modal-title pull-left">ընթացք<br/></h5>';
                        modal += '</div>';
                        modal += '<table class=".table-bordered finance-table">';
                            modal += '<tr>';
                                modal += '<th class="">կարգավիճակ</th>';
                                modal += '<th class="">նկարագրություն</th>';
                                modal += '<th class="">ժամկետ ddd</th>';
                                modal += '<th class="">գին</th>';
                            modal += '</tr>';
                            modal += '<tr>';
                                modal += '<td>'+status.status_name+'</td>';
                                modal += '<td>'+data.task_description+'</td>';
                                modal += '<td>'+data.work_end+'</td>';
                                modal += '<td>'+data.work_price+'</td>';
                            modal += '</tr>';
                        modal += '</table>';
                        modal += '<div class="modal-header">';
                            modal += '<h5 class="modal-title pull-left">ֆինանսական հաշվետվություն<br/></h5>';
                        modal += '</div>';
                        modal += '<table class=".table-bordered finance-table">';
                            modal += '<tr>';
                                modal += '<th class="">արժեք</th>';
                                modal += '<th class="">վճարված </th>';
                                modal += '<th class="">մնացորդ</th>';
                                modal += '<th class="">վճարման գրաֆիկ</th>';
                            modal += '</tr>';
                            modal += '<tr>';
                                modal += '<td>'+data.work_price+'</td>';
                                modal += '<td>'+data.payment+'</td>';
                                var total = (parseInt(data.work_price) - parseInt(data.payment));
                                modal += '<td>'+total+'</td>';
                                modal += '<td>'+data.payment_day+'</td>';
                            modal += '</tr>';
                        modal += '</table>';
                        
                    modal += '</div>';
            }
                modal += '</div>';
                modal += '<div class="modal-content">';
                    modal += '<div class="modal-footer">';
                        modal += '<button type="button" class="btn btn-link close2" data-dismiss="modal">Close</button>';
                    modal += '</div>';
                modal += '</div>';
            modal += '</div>';
        modal += '</div>';
        $(".modals-block").append(modal);
        $(".modal#modal-large1_"+org_id).addClass("show").toggle();    
    }
    
    Organizations.prototype.orgPagination = function (e) {
        e.preventDefault();
        var num = $(this).attr("data-page");
        $.ajax({
            type: "POST", 
            url: "/organizations",
            data: {page: num},
            success: org.orgTemplate
        });
    }
    
    var org = new Organizations();

    function getOrgSynq(id) {
        var jqxhr =  $.ajax({
            type: "POST", 
            url: "/organizations/getorganization",
            data: {id: id},
            async: false
        });
        var response = JSON.parse(jqxhr.responseText);
        return response;
    }
    
    function getOrgForOrgs(msg) {
        var data = JSON.parse(msg);
        var list = "";
        $.each(data, function(key, value) {
            if(key != "count") {
                list += '<li><a class="dropdown-item filterOrg-js" href="/organizations/filter?orgid='+value.organization_id+'">'+value.org_name+'</a></li>';
            }
        });
        $(".select-org-org-filter").append(list);
    }
    
    $("body").on("click", ".delete-org-js", org.deleteOrg);
    
    $("body").on("click", ".add-org-js", org.addOrganization);
    
    $("body").on("click", ".modal-op-order", function() {
        var id = $(this).data("id");
        var a = $(this).data("target");
        if($(a).css("display") == undefined) {
            org.getOrganization(id, org.orgModalsTemplate);
        }
    });
    
    $("body").on("click", ".modal-op-order-level-2", function() {
        var id = $(this).data("id");
        var a = $(this).data("target");
        if($(a).css("display") == undefined) {
            org.getOrgTasks(id, org.orgModal_2_Template);
        }
    });
    
     $("body").on("click", ".close", function() {
        $(this).parent().parent().parent().parent().parent().parent().toggle();
    });
    
    $("body").on("click", ".close2", function() {
        $(this).parent().parent().parent().parent().toggle();
    });
    
    $("body").on("click", ".pagination.organizations a", org.orgPagination);
    
    $("body").on("click", ".filterOrg-js", function(e) {
        e.preventDefault();
        var path = $(this).attr("href");
        $.ajax({
            url: path,
            success: org.orgTemplate
        });
    });
    
//    organizations///////////
    
    
    
    
    if(window.location.pathname == "/notes") {
        note.getNotes();    
    }
    
    if(window.location.pathname == "/") {
        task.getTasks()
        user.getAllUsers(getUsersForTasks); //callback 
        org.getAllOrganizations(getOrgForTasks);
    }
    
    if(window.location.pathname == "/administrations") {
        user.getUsers(user.userTemplate);
        user.getUniqueUser();
    }
    
    if(window.location.pathname == "/organizations") {
        org.getOrganizations(org.orgTemplate);
        org.getAllOrganizations(getOrgForOrgs);
    }
    
});




