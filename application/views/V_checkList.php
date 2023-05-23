<div class="container">
    <h1>繳費處理</h1>
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
                    <th class="text-center" style="">繳費金額</th>
                    <th class="text-center" style="">繳費情況</th>
					<th class="text-center" style="">列印繳費單</th>
                    <th class="text-center hidden-print"><label>全選<input id="chk_all_sel" type="checkbox"></label></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $total = 0;
                $counta = 0;
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
                        echo "<td class='text-right'>". number_format($row['ap_rg_money'], 0) ."</td>";
                        echo "<td class='text-center'>".$this->tools->getCheckPayType($row['ap_is_pay'])."</td>";
						echo "<td class='text-center'><a class='btn btn-info' style='margin-right: 5px;' target='_blank' href='/Apply/ManagePrintPay/".$row['ap_rg_id']."/".$row['ap_us_no']."'>列印繳費單</a></td>";
                        echo "<td class='text-center hidden-print'><input class='itemCheck' name='itemID[]' type='checkbox' value='".$row['ap_id']."'></td>";
                        echo "</tr>" ;

                        if($row['ap_is_pay'] == '1') {
                            $total += $row['ap_rg_money'];
                            $counta += 1;
                        }
                    }

                    echo '<tr style="background-color: #caffba;"><td colspan="6"></td><td colspan="2" class="text-right" id="td_total">總計：'. number_format($total, 0)  . '</td><td colspan="2" class="text-left">已繳費人數：'. $counta .'</td></tr>';
                } else {
                    echo "<tr>" ;
                    echo "<td class='text-center' colspan='9'>目前尚無資料</td>";
                    echo "</tr>" ;
                }
            ?>    
            </tbody>
        </table>   
        <div class='row hidden-print'>
            <div class='col-xs-12 text-right'>
                <button class='btn btn-danger' type="button" id="btn_submit_cancel_apply">取消報名</button>
                <button class='btn btn-warning' type="button" id="btn_submit_repay">退費</button>
                <button class='btn btn-danger' type="button" id="btn_submit_not_pay">未繳費</button>
                <button class='btn btn-primary' type="button" id="btn_submit_is_pay">已繳費</button>
            </div>
        </div>
    </form>
</div>
