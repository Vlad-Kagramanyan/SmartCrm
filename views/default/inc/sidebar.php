
<aside class="sidebar">
    <div class="scrollbar-inner">
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="/public/material/demo/img/profile-pics/8.jpg" alt="">
                <div>
                    <div>
                        <div class="user__name" data-id="<?php echo $_SESSION['user'] ?>"></div>
                        <div class="user__email"></div>
                    </div>
                </div>
            </div>
            <div class="dropdown-menu">
                <a href="/administrations/logout" class="dropdown-item">Ելք</a>
            </div>
        </div>
        <ul class="navigation">
            <li><a href="/"><i class="zmdi zmdi-flash"></i>Առաջադրանքներ</a></li>
            <li><a href="/organizations"><i class="zmdi zmdi-collection-text"></i>Գործընկերներ</a></li>
           <?php if($Path == "students" || $Path == "courses"): ?>
            <li class="navigation__sub navigation__sub--toggled">
                <a href=""><i class="zmdi zmdi-graduation-cap"></i>Դասընթացներ</a>
                <ul style="display: block;">
                    <li ><a href="/students">Ուսանողներ</a></li>
                    <li ><a href="/courses">Դասընթացների գրաֆիկ</a></li>
                </ul>
            </li> 
           <?php else: ?>
            <li class="navigation__sub">
                <a href=""><i class="zmdi zmdi-graduation-cap"></i>Դասընթացներ</a>
                <ul>
                    <li><a href="/students">Ուսանողներ</a></li>
                    <li><a href="/courses">Դասընթացների գրաֆիկ</a></li>
                </ul>      
            </li>
            
           <?php endif; ?>
<!--            <li><a href="/finances"><i class="zmdi zmdi-money-box"></i>ֆինանսներ</a></li>-->
            <li><a href="/administrations"><i class="zmdi zmdi-accounts-list"></i>Ադմինիստրացիա</a></li>

            <li class="notes"><a href="/notes"><i class="zmdi zmdi-money-box"></i>նշումներ</a></li>
        </ul>
    </div>
</aside>