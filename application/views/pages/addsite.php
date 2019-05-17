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
                <h3>新增站址</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>新增站址
                            <small>录入站址信息</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="form-site" class="form-horizontal form-label-left" method="post" novalidate>

                            <p>在此页面录入站址信息数据 </p>
                            <span class="section">站址数据表单</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sitename">机房名称 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="sitename" class="form-control col-md-7 col-xs-12"
                                           name="sitename" placeholder="机房名称 例如： 天府新区川大西园五舍LM资源点" required="required"
                                           type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sitelevel">机房等级 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="levelcode" class="form-control required" id="sel-levelcodel"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($sitelevel as $item): ?>
                                            <option value="<?php echo $item['levelcode']; ?>">
                                                <?php echo $item['levelstr']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">产权属性 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="prcode" class="form-control required" id="sel-prcode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($sitepr as $item): ?>
                                            <option value="<?php echo $item['prcode']; ?>">
                                                <?php echo $item['pr']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">基站类型 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="sitetypecode" class="form-control required" id="sel-sitetypecode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($sitetype as $item): ?>
                                            <option value="<?php echo $item['sitetypecode']; ?>">
                                                <?php echo $item['sitetype']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">站址地址 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="stieaddress" class="form-control col-md-7 col-xs-12"
                                           name="stieaddress" placeholder="站址地址 例如： 川大路二段四川大学江安校区川大西园" required="required"
                                           type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">面积（㎡） <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="squarearea" class="form-control col-md-7 col-xs-12"
                                           name="squarearea" placeholder="面积（㎡）: 10" required="required"
                                           type="number"  data-validate-minmax="1,100000">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">覆盖场景 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="covercode" class="form-control required" id="sel-covercode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($cover as $item): ?>
                                            <option value="<?php echo $item['covercode']; ?>">
                                                <?php echo $item['cover']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">分公司 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="branchcomcode" class="form-control required" id="sel-branchcomcode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($branchcom as $item): ?>
                                            <option value="<?php echo $item['branchcomcode']; ?>">
                                                <?php echo $item['branchcom']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">区域 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="areacode" class="form-control required" id="sel-areacode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($area as $item): ?>
                                            <option value="<?php echo $item['areacode']; ?>">
                                                <?php echo $item['area']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">供电类型 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="powertypecode" class="form-control required" id="sel-powertypecode"
                                            required="required">
                                        <option value="">请选择</option>
                                        <?php foreach ($powertype as $item): ?>
                                            <option value="<?php echo $item['powertypecode']; ?>">
                                                <?php echo $item['powertype']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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
                                                    <h4 class="modal-title" id="myModalLabel2">录入站址信息成功</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>提示：</h4>
                                                    <p>站址已成功录入。</p>
                                                    <h4>可用的下一步操作：</h4>
                                                    <p>可在站址资料页面查找到此站址信息；</p>
                                                    <p>可在站址详情页面录入此站址的房屋租赁合同信息、房租支付信息、电费分摊协议信息、电费支付信息。</p>
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