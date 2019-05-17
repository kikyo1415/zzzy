<!-- page content -->
<!--莫让幽怨记心头 你我不过半壶酒-->
<!--策马奔腾何处走 我来世还复休-->
<script>
    baseserviceurl = "<?php echo $baseserviceurl;?>";
    franchiserserviceurl = "<?php echo $franchiserserviceurl;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>新增用户</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>注册系统用户
                            <small>输入注册信息</small>
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="form1" class="form-horizontal form-label-left" method="post" novalidate>
                            <span class="section">注册信息表单</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">登录名 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="username" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="50" name="username"
                                           placeholder="登录系统的用户名 例如：zhangsan" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">密码<span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="userpwd" type="password" name="userpwd" data-validate-length="5,18"
                                           class="form-control col-md-7 col-xs-12" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">重复密码<span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" data-validate-linked="userpwd"
                                           class="form-control col-md-7 col-xs-12"
                                           required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">所属经销商 <span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php if ($userinfo['usertypecode'] === '0'): ?>
                                        <select id="sel-fran" name="franchid" class="form-control">
                                            <option value="">请选择</option>
                                        </select>
                                    <?php elseif ($userinfo['usertypecode'] === '1'): ?>
                                        <select id="sel-fran2" name="franchid" class="form-control">
                                            <option value="<?php echo $userinfo['franchid']; ?>">
                                                <?php echo $userinfo['franname']; ?>
                                            </option>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">使用者真实姓名 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="usertruename"
                                           placeholder="用户名常用者姓名 例如：张三" required="required" type="text">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="submituser" type="submit" class="btn btn-success">提交</button>
                                    <button type="submit" class="btn btn-primary">重置</button>
                                </div>
                            </div>


                            <!-- modal-->
                            <div id="tipmodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button id="modalclose" type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">注册用户成功</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>可用的下一步操作：</h4>
                                            <p>可用此用户登录本系统。</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="modalconfirm" type="button" class="btn btn-success">确认</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end modal-->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->