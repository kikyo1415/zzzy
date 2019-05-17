<!-- page content -->
<script>
    currentbase_url = "<?php echo $currentbase_url;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                        ? '经销商查看'
                        : '直营商查看';
                    ?>
                    <small><?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                            ? '经销商列表'
                            : '直营商列表';
                        ?></small>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" id="txt-search" class="form-control" placeholder="按名称搜索经销商..."
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
                        <h4><?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                ? '经销商'
                                : '直营商';
                            ?></h4>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">

                        <p><?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                ? '所有经销商'
                                : $userinfo['franname'] . '下辖的直营商';
                            ?></p>

                        <!-- start project list -->
                        <table class="table table-striped projects ve_table">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 15%;">经销商名称</th>
                                <th style="width: 15%">经销商类型</th>
                                <th style="width: 10%">最大可激活项目数</th>
                                <th style="width: 15%">联系人</th>
                                <th style="width: 15%">联系电话</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datapagelist as $item): ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a><?php echo $item['franname']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['typename']; ?></a>
                                        <br/>
                                        <small><?php
                                            if ($item['frantypecode'] == 2) {
                                                echo '所属囤货商：' . $item['parentname'];
                                            }
                                            ?></small>
                                    </td>
                                    <td>
                                        <a><?php echo $item['maxactivatepro']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['contacts']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['tel']; ?></a>
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
                        </div>
                        <!--end pagecontrol-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
