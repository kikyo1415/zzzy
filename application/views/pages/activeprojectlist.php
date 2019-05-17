<!-- page content -->
<script>
    currentbase_url = "<?php echo $currentbase_url;?>";
    serviceurl = "<?php echo $serviceurl;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>当前激活项目
                    <small><?php echo $pagedescription; ?></small>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" id="txt-search" class="form-control" placeholder="按名称搜索项目..."
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
                        <h4>项目</h4>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                        <p><?php echo $listdescription; ?></p>
                        <!-- start project list -->
                        <table class="table table-striped projects ve_table">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 15%">项目名称</th>
                                <th style="width: 10%">项目金额</th>
                                <th style="width: 30%">项目地址</th>
                                <th style="width: 10%">项目渠道</th>
                                <th style="width: 5%">状态</th>
                                <th style="width: 30%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datapagelist as $item): ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a><?php echo $item['proname']; ?></a>
                                        <br/>
                                        <small>录入于 <?php echo $item['entrytime']; ?></small>
                                    </td>
                                    <td>
                                        <a><?php echo '￥' . $item['offeramount']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['fullname'] . '-' . $item['addresscode2']; ?></a>
                                    </td>
                                    <td>
                                        <a><?php echo $item['channelname']; ?></a>
                                    </td>

                                    <td style="vertical-align: middle">
                                        <button type="button" class="btn
                                        <?php echo $item['prostatuscode'] === '1' ? 'btn-info' : 'btn-success'; ?>
                                         btn-xs"><?php echo $item['statusname']; ?></button>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <button data-comdata="<?php echo $item['ID']; ?>"
                                            <?php echo $item['prostatuscode'] !== '1'
                                                ? "disabled=\"disabled\"" : ''; ?>
                                                class="act_signbill btn <?php echo $item['prostatuscode'] === '1'
                                                    ? 'btn-success' : 'btn-dark'; ?> btn-xs"><i class="fa fa-check"></i>
                                            签单
                                        </button>
                                        <button href="#" name="act_detail" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-folder"></i> 详情
                                        </button>
                                        <button name="act_dispose" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i> 释放
                                        </button>
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
                    <!-- modal-->
                    <div id="tipmodal" class="modal fade bs-example-modal-sm" style="top:20%;" tabindex="-1"
                         role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button id="modalclose" type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">确认签单</h4>
                                </div>
                                <div class="modal-body">
                                    <h6>项目将会变为已签单项目</h6>
                                </div>
                                <div class="modal-footer">
                                    <button id="modalconfirm" type="button" class="btn btn-success">确认</button>
                                    <button id="modalcancel" data-dismiss="modal" type="button" class="btn btn-primary">
                                        取消
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
