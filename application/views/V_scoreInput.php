<div class="container">
    <h1>成績處理<small>(預設-1代表成績尚未輸入)</small></h1>
    <hr>
    <form id="formData" name="formData" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">證照名稱</th>
                    <th class="text-center">系所班</th>
                    <th class="text-center">學號</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">英文姓名</th>
                    <th class="text-center">身分證字號</th>
                    <th class="text-center">連絡電話</th>
                    <th class="text-center">繳費情況</th>
                    <th class="text-center">成績</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(count($list) > 0 ) {
                    $i = 1;
                    foreach($list as $row) {
                        echo "<tr>" ;
                        echo "<td class='text-center'>".$i++."</td>";
                        echo "<td class='text-center'>".$row['ap_le_name']."</td>";
                        echo "<td class='text-left'>".$row['ap_us_cdept']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_no']."</td>";
                        echo "<td class='text-left'>".$row['ap_us_name']."</td>";
                        echo "<td class='text-left'>".$row['ap_us_ename']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_id']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_phone']."</td>";
                        echo "<td class='text-center'>".$this->tools->getCheckPayType($row['ap_is_pay'])."</td>";
                        echo "<td class='text-center'><input type='text' style='width: 50px;' name='score[]' value='".$row['ap_score']."'><input type='hidden' name='user_id[]' value='".$row['ap_id']."'></td>";
                        echo "</tr>" ;
                    }
                } else {
                    echo "<tr>" ;
                    echo "<td class='text-center' colspan='9'>目前尚無資料</td>";
                    echo "</tr>" ;
                }
            ?>    
            </tbody>
        </table>   
        <div class='row'>
            <div class='col-xs-12 text-right'>
                <button class='btn btn-danger' type="button" id="btn_submit_score">更新成績</button>
            </div>
        </div>
    </form>
</div>