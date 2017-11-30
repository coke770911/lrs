<div class="container">
    <h1>考試資訊</h1>
    <hr>
    <form class="form-horizontal" id="formData" method="post" action="#">
        <div class="form-group">
            <label class="col-sm-2 control-label">證照名稱</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <?php echo $rg['rg_name'] ?>
                    <input type="hidden" name="rg_name" value="<?php echo $rg['rg_name'] ?>">
                    <input type="hidden" name="rg_id" value="<?php echo $rg['rg_id']?>">
                    <input type="hidden" name="rg_mode" value="修改">
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
                            <?php echo $value['le_name']?>
                          </label>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">目前報名人數</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <?php echo $rg['rg_nowNumber'] ?>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">報名人數限制</label>
            <div class="col-sm-1">
                <label class="control-label">
                    <input type="text" class="form-control" name="rg_number" value="<?php echo $rg['rg_number'] ?>">
                </label>
            </div>
        </div>
     
   
        <div class="form-group">
            <label class="col-sm-2 control-label">考試費用</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <input type="text" class="form-control" name="rg_money" value="<?php echo number_format($rg['rg_money']) ?>">
                </label>
            </div>
        </div>
 

        <div class="form-group">
            <label class="col-sm-2 control-label">考試時間</label>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_startDate" value="<?php echo nice_date($rg['rg_startDate'], 'Y-m-d H:i') ?>">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_endDate" value="<?php echo nice_date($rg['rg_endDate'], 'Y-m-d H:i') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">報名截止時間</label>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_applyEndDate" value="<?php echo nice_date($rg['rg_applyEndDate'], 'Y-m-d H:i') ?>">     
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">是否需官網註冊</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="radio" name="rg_is_regi" value="1" <?php echo $rg['rg_is_regi'] =="1" ? "checked": "" ; ?> >是
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="rg_is_regi" value="0" <?php echo $rg['rg_is_regi'] =="1" ? "" : "checked" ; ?> >否
                </label>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">備註說明</label>
            <div class="col-sm-10">
                <textarea class="form-control" style="height: 200px;" rows="3" name="rg_memo"><?php echo $rg["rg_memo"] ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <?php if(now() <= nice_date($rg['rg_applyEndDate'])) { ?>
                <button type="button" id="btn_Theme_submit" class="btn btn-primary btn-lg btn-block">修改報名資訊</button>
                <?php } ?>
                <button type="button" id="btn_cancel" class="btn btn-danger btn-lg btn-block">回上一頁</button>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </form>
</div>