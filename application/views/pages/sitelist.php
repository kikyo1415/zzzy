<!-- page content -->
<script>
    currentbase_url = "<?php echo $currentbase_url;?>";
    serviceurl = "<?php echo $serviceurl;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users
                    <small>Some examples to get you started</small>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Button Example
                            <small>Users</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            The Buttons extension for DataTables provides a common set of options, API methods and
                            styling to display buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built.
                        </p>
                        <table id="sitestable" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>站点名称</th>
                                <th>机房等级</th>
                                <th>产权属性</th>
                                <th>基站类型</th>
                                <th>站址地址</th>
                                <th>面积（㎡）</th>
                                <th>覆盖场景</th>
                                <th>分公司</th>
                                <th>区域</th>
                                <th>供电类型</th>
                                <th>备注信息</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datapagelist as $item): ?>
                                <tr data-key="<?php echo $item['ID']; ?>">
                                    <td style="width: 10%"><?php echo $item['sitename']; ?></td>
                                    <td  style="width: 8%"><?php echo $item['levelstr']; ?></td>
                                    <td style="width: 8%"><?php echo $item['pr']; ?></td>
                                    <td style="width: 12%"><?php echo $item['sitetype']; ?></td>
                                    <td style="width: 12%"><?php echo $item['stieaddress']; ?></td>
                                    <td style="width: 10%"><?php echo $item['squarearea']; ?></td>
                                    <td style="width: 8%"><?php echo $item['cover']; ?></td>
                                    <td style="width: 8%"><?php echo $item['branchcom']; ?></td>
                                    <td style="width: 8%"><?php echo $item['area']; ?></td>
                                    <td style="width: 8%"><?php echo $item['powertype']; ?></td>
                                    <td style="width: 8%"><?php echo $item['remark']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
