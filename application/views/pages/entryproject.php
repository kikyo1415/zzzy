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
                <h3>登录项目</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>录入项目
                            <small>输入项目信息</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="form-project" class="form-horizontal form-label-left" method="post" novalidate>

                            <p>在此页面录入项目的全新数据 </p>
                            <span class="section">项目数据表单</span>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">经销商
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="firstfranname" class="form-control col-md-7 col-xs-12"
                                           name="firstfranname" type="text" value="<?php echo $userinfo['franname']; ?>"
                                           readonly="readonly">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">项目名称 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="proname" class="form-control col-md-7 col-xs-12"
                                           name="proname" placeholder="项目名称 例如： XXXX小区XX型号项目" required="required"
                                           type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">项目渠道 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="sel-channel" name="channelcode" class="form-control">
                                        <option value="">
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">项目地址 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-4 " style="padding: 0">
                                        <select class="form-control">
                                            <option>四川省</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 " style="padding: 0">
                                        <select class="form-control" id="sel-city">
                                            <option>请选择城市\自治州</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 " style="padding: 0">
                                        <select class="form-control" id="sel-area">
                                            <option>请选择区\县</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 " style="padding: 0">
                                        <select class="form-control" id="addresscode1" name="addresscode1">
                                            <option value="">请选择街道\乡镇</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 " style="padding: 0">
                                        <input id="addressxq" class="form-control col-md-5 col-xs-12"
                                               placeholder="小区名称 例如： 昆仑华庭一期" required="required">
                                    </div>
                                    <div class="col-md-1" style="padding: 0">
                                        <input id="addressld" class="form-control col-md-1 col-xs-12"
                                               placeholder="栋" required="required" type="number">
                                    </div>
                                    <div class="col-md-1" style="padding: 0">
                                        <input id="addressdy" class="form-control col-md-1 col-xs-12"
                                               placeholder="单元" required="required" type="number">
                                    </div>
                                    <div class="col-md-1" style="padding: 0">
                                        <input id="addressroom" class="form-control col-md-1 col-xs-12"
                                               placeholder="号" required="required" type="number">
                                    </div>
                                    <input id="addresscode2" name="addresscode2" type="hidden">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">项目报价(元)<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="amount" name="amount" data-validate-minmax="0,100000000"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">客户姓名 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="customer" class="form-control col-md-7 col-xs-12"
                                           name="customer" placeholder="客户姓名 例如： 张三" required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customertel">客户电话 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="customertel" name="customertel" required="required"
                                           placeholder="客户11位手机号码" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remark">备注
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="remark" name="remark" placeholder="备注，200字以内（可不填）"
                                              class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">确定</button>
                                    <button id="cancel" type="reset" class="btn btn-primary">重置</button>
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
                                                    <h4 class="modal-title" id="myModalLabel2">录入项目成功</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>提示：</h4>
                                                    <p>项目已成功录入，将会占用1个项目录入额度；</p>
                                                    <p>项目签单成功时请于[项目信息查询]模块或[当前激活项目]模块进行签单登记操作。</p>
                                                    <h4>可用的下一步操作：</h4>
                                                    <p>可在项目查询页面查找到此项目信息；</p>
                                                    <p>可继续依据项目地址重复录入此项目，视为项目跟进操作。</p>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->