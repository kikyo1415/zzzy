<!-- page content -->
<!--莫让幽怨记心头 你我不过半壶酒-->
<!--策马奔腾何处走 我来世还复休-->
<script>
    baseserviceurl = "<?php echo $baseserviceurl;?>";
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    新增<?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                        ? '经销商'
                        : '直营商'; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>
                            注册<?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                ? '经销商'
                                : '直营商'; ?>
                            <small>
                                输入<?php echo (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                    ? '经销商'
                                    : '直营商'; ?>信息
                            </small>
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="form1" class="form-horizontal form-label-left" method="post" novalidate>

                            <!--                            <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>-->
                            <!--                            </p>-->
                            <span class="section"><?php (!isset($userinfo['franname']) || empty($userinfo['franname']))
                                    ? '经销商'
                                    : '直营商'; ?>信息表单</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">经销商名称 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="50" name="franname"
                                           placeholder="经销商名称 例如：四川天适空调工程技术有限责任公司" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="frantype">经销商类型 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-1 col-sm-6">
                                    <select name="frantypecode" class="form-control" id="sel-type">
                                        <?php if ($userinfo['usertypecode'] === '0'): ?>
                                            <option value="1">囤货商</option>
                                        <?php endif; ?>
                                        <option value="2">直营商</option>
                                    </select>
                                </div>
                                <div id="storediv" class="col-md-6 col-sm-6 col-xs-12" style="display: none;">
                                    <label id="stroelb" class="control-label col-md-2 col-sm-6 col-xs-12" for="name">所属囤货商
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <?php if ($userinfo['usertypecode'] === '0'): ?>
                                            <select id="sel-storefran" name="parenntfranid" class="form-control">
                                                <option value="">请选择</option>
                                            </select>
                                        <?php elseif ($userinfo['usertypecode'] === '1'): ?>
                                            <select id="sel-storefran2" name="parenntfranid" class="form-control">
                                                <option value="<?php echo $userinfo['franchid']; ?>">
                                                    <?php echo $userinfo['franname']; ?>
                                                </option>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">最大可登录项目数 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="maxactivatepro" name="maxactivatepro" required="required"
                                           data-validate-minmax="1,10000" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">联系人 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="contacts" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="50" name="contacts"
                                           placeholder="经销商联系人 例如： 张三" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">联系人电话 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="telephone" name="tel" required="required"
                                           data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="submitfran" type="submit" class="btn btn-success">提交</button>
                                    <button type="submit" class="btn btn-primary">重置</button>
                                    <!-- modal-->
                                    <div id="tipmodal" class="modal fade bs-example-modal-sm" tabindex="-1"
                                         role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button id="modalclose" type="button" class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2">注册经销商成功</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>可用的下一步操作：</h4>
                                                    <p>可在经销商列表查询到此经销商；</p>
                                                    <p>可在注册系统用户时选择此经销商进而注册此经销商下的系统用户。</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="modalconfirm" type="button" class="btn btn-success">确认
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
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /page content -->