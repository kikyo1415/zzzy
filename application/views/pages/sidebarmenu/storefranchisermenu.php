<!--囤货商权限左侧菜单-->
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>功能模块-<?php echo $userinfo['typename']; ?></h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> 首页 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pages/index.html">首页</a></li>
                    <li><a href="pages/projectdetail.html">主题2</a></li>
                    <!--                                    <li><a href="index3.html">主题3</a></li>-->
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> 项目 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="pages/entryproject.html">录入项目</a>
                    <li><a href="pages/activeprojectlist.html">当前激活项目</a>
                    <li><a href="pages/projectlist.html">项目信息查询</a>
                    <li><a href="#">项目情况统计</a>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> 经销商 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a><i class="fa fa-desktop"></i> 经销商管理 <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="pages/addfranchiser.html"><i class="fa fa-edit"></i>新增经销商</a></li>
                            <li><a href="pages/franchiserlist.html"><i class="fa fa-desktop"></i>经销商查看</a></li>
                        </ul>
                    </li>
                    <li><a href="media_gallery.html">经销商项目信息</a></li>
                    <li><a href="typography.html">经销商项目情况统计</a></li>
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