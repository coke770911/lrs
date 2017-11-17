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
                            <input type="radio" name="rg_item" value="<?php echo $value['le_name']?>">
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
                <textarea class="form-control" rows="3" style="height: 200px;" disabled><?php echo $rg["rg_memo"] ?></textarea>
            </div>
        </div>
   
        <h1>報名資料填寫</h1>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">學號</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="學號" name="no" value="<?php echo $this->session->us_no ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">中文姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="中文姓名" name="c_name" value="<?php echo $this->session->us_name ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">英文姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="英文姓名" name="e_name" value="<?php echo strtoupper($this->session->us_ename) ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">性別</label>
            <div class="col-sm-10">  
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="M" <?php echo $this->session->us_sex === "M" ? "checked ": "" ; ?>>男
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" value="F" <?php echo $this->session->us_sex === "M" ? " ": "checked" ; ?>>女
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">身分證字號</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="身分證字號" name="id" value="<?php echo $this->session->us_id ?>">
            </div>
        </div>
       
       <div class="form-group">
            <label class="col-sm-2 control-label">系年班</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="系年班" name="c_dept" value="<?php echo $this->session->us_dept.$this->session->us_grade.$this->session->us_class ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">行動電話</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="請輸入可連絡電話號碼" name="phone" value="<?php echo $this->session->us_phone ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">電子郵件</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="電子郵件" name="email" value="<?php echo $this->session->us_email ?>">
            </div>
        </div>

        <?php if($rg['rg_is_regi'] == 1) { ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">註冊</label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regi" value="1" >是
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regi" value="0" checked>否
                    </label>
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">備註</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="2" name="memo" maxlength="120"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="button" id="btn_apply_submit" class="btn btn-primary btn-lg btn-block">送出報名資料</button>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-danger btn-lg btn-block" onclick"location.replace('/lrs')">回上一頁</button>
            </div>
            <div class="col-sm-4"></div>
        </div>  
    </form>
</div>