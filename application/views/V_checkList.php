<div class="container">
    <h1>報名資料列表</h1>
    <hr>
    <form id="formData" name="formData" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">學號</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">英文姓名</th>
                    <th class="text-center">身分證字號</th>
                    <th class="text-center" style="">連絡電話</th>
                    <th class="text-center" style="">繳費情況</th>
                    <th class="text-center">
                        <label>全選<input id="chk_all_sel" type="checkbox"></label>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(count($list) > 0 ) {
                    $i = 1;
                    foreach($list as $row) {
                        echo "<tr>" ;
                        echo "<td class='text-center'>".$i++."</td>";
                        echo "<td class='text-center'>".$row['ap_us_no']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_name']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_ename']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_id']."</td>";
                        echo "<td class='text-center'>".$row['ap_us_phone']."</td>";
                        if($row['ap_is_pay'] == 0) {
                            echo "<td class='text-center'>尚未繳費</td>";
                        } else {
                            echo "<td class='text-center'>已繳費</td>";
                        }
                        
                        echo "<td class='text-center'><input class='itemCheck' name='itemID[]' type='checkbox' value='".$row['ap_id']."'></td>";
                        echo "</tr>" ;
                    }
                }   
            ?>    
            </tbody>
        </table>   
        <div class='row'>
            <div class='col-xs-12 text-right'>
                <button class='btn btn-primary' type="button" id="btn_submit_pay">繳費更新</button>
            </div>
        </div>
    </form>
</div>