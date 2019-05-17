<!-- page content -->
<script>
    currentbase_url = "<?php echo $currentbase_url;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>查看用户
                    <small>用户列表</small>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" id="txt-search" class="form-control" placeholder="按名称搜索用户..."
                               value="<?php echo $keyword; ?>">
                        <span class="input-group-btn">
                      <button id="btn-search" class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>用户</h4>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <p><?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                ? '所有用户'
                                : $userinfo['franname'] . '的系统用户';
                            ?></p>

                        <!-- start project list -->
                        <table class="table table-striped projects ve_table">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 10%">用户名</th>
                                <th style="width: 15%">所属经销商</th>
                                <th style="width: 15%">常用者真实姓名</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datapagelist as $item): ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a><?php echo $item['username']; ?></a>
                                    </td>
                                    <td >
                                        <a><?php echo $item['franname']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['usertruename']; ?></a>
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 编辑 </a>
                                        <!--                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>-->
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- end project list -->
                        <!--start pagecontrol-->
                        <div class="pagecontroldiv">
                            <?php echo $datapagecontrol; ?>
                            <!--end pagecontrol-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
