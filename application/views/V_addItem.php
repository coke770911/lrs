<div class="container">
    <h1>新增證照選項</h1>
    <hr>
    <form class="form-inline" id="formData" method="post" action="#">
        <div class="form-group">
            <label>考試項目分類</label>
            <select class="form-control" name="lg_item" id="lg_item">
                <option value="">--請選擇--</option>
                <option value="1">PMA (National Project Management Association)</option>
                <option value="2">ERP (Chinese Enterprise Resource Planning Society)</option>
                <option value="3">ACA (Adobe Certified Associate)</option>
                <option value="4">SSE (Silicon Stone Edcation)</option>
                <option value="5">IC3 (Internet and Computing Core Certifications)</option>
                <option value="6">MTA (Microsoft Technology Associate)</option>
                <option value="7">TQC企業人才技能認證</option>
                <option value="8">TQC+專業設計人才認證</option>
                <option value="9">EEC企業電子化人才能力鑑定</option>
                <option value="10">ITE資訊專業人員鑑定</option>
                <option value="11">其他</option>
            </select>
            <label>考試項目名稱</label>
            <input type="text" class="form-control" name="le_name">
            <button type="button" class="btn btn-default" id="btn_addItem_submit">新增</button>
        </div>
    </form>
    <h1>證照子項目確認</h1>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <select multiple class="form-control" id="lg_item_check" style="height: 250px;">
                <option value="1">PMA (National Project Management Association)</option>
                <option value="2">ERP (Chinese Enterprise Resource Planning Society)</option>
                <option value="3">ACA (Adobe Certified Associate)</option>
                <option value="4">SSE (Silicon Stone Edcation)</option>
                <option value="5">IC3 (Internet and Computing Core Certifications)</option>
                <option value="6">MTA (Microsoft Technology Associate)</option>
                <option value="7">TQC企業人才技能認證</option>
                <option value="8">TQC+專業設計人才認證</option>
                <option value="9">EEC企業電子化人才能力鑑定</option>
                <option value="10">ITE資訊專業人員鑑定</option>
                <option value="11">其他</option>
            </select>
        </div>
        <div class="col-sm-6">
            <select multiple class="form-control" style="height: 250px;" id="item_check_list">
                
            </select>
        </div>
    </div>
</div>
