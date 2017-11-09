<div class="container">
    <h1>考試資訊</h1>
    <hr>
    <form class="form-horizontal" id="formData" method="post" action="#">
        <div class="form-group">
            <label class="col-sm-2 control-label">證照名稱</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <?php echo $rg['rg_name'] ?>
                    <input type="hidden" name="rg_id" value="<?php echo $rg['rg_id']?>">
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">證照項目</label>
            <div class="col-sm-10">
                <?php foreach($item AS $value) {?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="radio">
                          <label>
                            <input type="radio" name="rg_item" value="<?php echo $value['le_name']?>" <?php echo $value['le_name'] == $userdata["ap_le_name"] ? "checked":"";?>>
                            <?php echo $value['le_name']?>
                          </label>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">考試費用</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <?php echo number_format($rg['rg_money']) ?>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">考試時間</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <?php echo nice_date($rg['rg_startDate'], 'Y-m-d H:i').' ~ '.nice_date($rg['rg_endDate'], 'Y-m-d H:i') ?>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">備註說明</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" disabled></textarea>
            </div>
        </div>
   
        <h1>報名資料</h1>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">學號</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="學號" disabled value="<?php echo $userdata["ap_us_no"] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">中文姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="中文姓名" name="c_name" disabled value="<?php echo $userdata["ap_us_name"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">英文姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="英文姓名" name="e_name" value="<?php echo $userdata["ap_us_ename"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">性別</label>
            <div class="col-sm-10">  
                <label class="checkbox-inline">
                    <input type="radio" name="sex" disabled value="M" <?php echo $userdata["ap_us_sex"] === "M" ? "checked ": "" ; ?>>男
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" disabled value="F" <?php echo $userdata["ap_us_sex"] === "M" ? " ": "checked" ; ?>>女
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">身分證字號</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="身分證字號" name="id" disabled value="<?php echo $userdata["ap_us_id"] ?>">
            </div>
        </div>
       
       <div class="form-group">
            <label class="col-sm-2 control-label">系年班</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="系年班" name="c_dept" value="<?php echo $userdata["ap_us_cdept"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">連絡電話</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="行動電話" name="phone" value="<?php echo $userdata["ap_us_phone"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">電子郵件</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="電子郵件" name="email" value="<?php echo $userdata["ap_us_email"] ?>">
            </div>
        </div>

        <?php if($rg['rg_is_regi'] == "1") { ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">註冊</label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regi" value="1" <?php echo $userdata["ap_is_regi"] === '1' ? "checked ": "" ; ?>>是
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regi" value="0" <?php echo $userdata["ap_is_regi"] === '0' ? "checked ": "" ; ?>>否
                    </label>
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">備註</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="2" name="memo" maxlength="120"><?php echo $userdata["ap_us_memo"] ?></textarea>
            </div>
        </div>
        <?php if(now() <= nice_date($rg['rg_applyEndDate'])) { ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="button" id="btn_apply_edit_submit" class="btn btn-primary btn-lg btn-block">送出修改</button>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="/lrs/Apply/historyList" class="btn btn-danger btn-lg btn-block">回上頁</a>
            </div>
            <div class="col-sm-4"></div>
        </div>  

    </form>
</div>
