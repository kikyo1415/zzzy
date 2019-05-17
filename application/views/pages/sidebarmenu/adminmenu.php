<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>功能模块-<?php echo $userinfo['typename'] ?: $userinfo['usertypename']; ?></h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> 首页 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pages/index.html">首页</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> 站址管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pages/addsite.html">新增站址</a>
                    <li><a href="pages/sitelist.html">站址资料</a>
                    <li><a href="#">站址情况统计</a>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> 待办事项 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pages/addfranchiser.html"><i class="fa fa-edit"></i>待续签合同站址</a></li>
                    <li><a href="pages/franchiserlist.html"><i class="fa fa-desktop"></i>待缴房租电费站址</a></li>
                </ul>
            </li>


            <li><a><i class="fa fa-cog"></i> 系统管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a><i class="fa fa-user"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="pages/adduser.html"><i class="fa fa-edit"></i> 新增用户</a></li>
                            <li><a href="pages/userlist.html"><i class="fa fa-users"></i> 查看用户</a></li>
                        </ul>
                    </li>
                    <li><a href="media_gallery.html">权限设置</a></li>
                    <li><a href="pages/systemsetting.html">系统个性配置</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->