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
                    <?php echo $rg['rg_money'] ?>
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
                <textarea class="form-control" rows="3" style="height: 125px;" disabled><?php echo $rg["rg_memo"] ?></textarea>
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
                <button type="button" id="btn_cancel" class="btn btn-danger btn-lg btn-block">取消報名</button>
            </div>
            <div class="col-sm-4"></div>
        </div>  
    </form>
</div>