<div class="container">
    <h1>新增證照考試</h1>
    <hr>
    <form class="form-horizontal" id="formData" method="post" action="#">
        <div class="form-group">
            <label class="col-sm-2 control-label">新增考試名稱</label>
            <div class="col-sm-10">
                <label class="control-label" >
                   <input type="text" class="form-control" name="rg_name">  
                   <input type="hidden" name="rg_id" value="0">
                   <input type="hidden" name="rg_mode" value="新增">
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">新增考試項目</label>
            <div class="col-sm-3">
                <select class="form-control" id="sel_lg_group">
                    <option value="0">--請選擇證照分類--</option>
                    <option value="1">PMA (Project Management Association)</option>
                    <option value="2">ERP (Enterprise Resource Planning)</option>
                    <option value="3">ACA (Adobe Certified Associate)</option>
                    <option value="4">SSE (Silicon Stone Edcation)</option>
                    <option value="5">IC3 (Internet and Computing Core Certifications)</option>
                    <option value="6">MTA (Microsoft Technology Associate)</option>
                    <option value="7">TQC企業人才技能認證</option>
                    <option value="8">TQC+專業設計人才認證</option>
                    <option value="9">TQC/EEC企業電子化人才能力鑑定</option>
                    <option value="10">ITE資訊專業人員鑑定</option>
                    <option value="12">ITS 國際認證考試</option>
                    <option value="11">其他</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="lg_item" id="lg_item">
                    <option value="0">--請選擇證照--</option>
                </select>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-default" id="btn_addItem">新增</button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" >目前新增項目</label>
            <div class="col-sm-10" id="itemContent"></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">報名人數限制</label>
            <div class="col-sm-1">
                <label class="control-label">
                    <input type="text" class="form-control" name="rg_number">
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">考試費用</label>
            <div class="col-sm-10">
                <label class="control-label" >
                    <input type="text" class="form-control" name="rg_money">
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">考試時間</label>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_startDate">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_endDate">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">報名截止時間</label>
            <div class="col-sm-2">
                <input type="text" class="form-control datainput" name="rg_applyEndDate">     
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-2 control-label">是否需官網註冊</label>
            <div class="col-sm-10">
                <label class="checkbox-inline">
                    <input type="radio" name="rg_is_regi" value="1" >是
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="rg_is_regi" value="0" checked>否
                </label>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">備註說明</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" style="height: 200px;" name="rg_memo"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="button" id="btn_Theme_submit" class="btn btn-primary btn-lg btn-block">新增報名資訊</button>
                <button type="button" id="btn_cancel" class="btn btn-danger btn-lg btn-block">回上一頁</button>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </form>
</div>