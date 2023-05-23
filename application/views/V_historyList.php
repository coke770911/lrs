<div class="container">
    <h1>報名歷程</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr >
                <th class="text-center">#</th>
                <th class="text-center">證照名稱</th>
                <th class="text-center">證照項目</th>
                <th class="text-center" style="width: 15%;">考試時間</th>
                <th class="text-center" style="width: 8%;">報名截止日</th>
                <th class="text-center" style="width: 7%;">考試費用</th>
                <th class="text-center" style="width: 7%;">繳費狀態</th>
                <th class="text-center" style="width: 5%;">分數</th>
                <th class="text-center" style="width: 23%;">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(count($list) > 0 ) {
                $i = 1;
                foreach($list as $row) {
                    echo "<tr>" ;
                    echo "<td class='text-center'>".$i++."</td>";
                    echo "<td class='text-center'>".$row['ap_rg_name']."</td>";
                    echo "<td class='text-center'>".$row['ap_le_name']."</td>";
                    echo "<td class='text-center'>".nice_date($row['rg_startDate'], 'Y-m-d H:i')." ~ ".nice_date($row['rg_endDate'], 'Y-m-d H:i')."</td>";
                    echo "<td class='text-center'>".nice_date($row['rg_applyEndDate'], 'Y-m-d H:i')."</td>";
                    echo "<td class='text-center'>".number_format($row['ap_rg_money'])."</td>";
                    echo "<td class='text-center'>".$this->tools->getCheckPayType($row['ap_is_pay'])."</td>";                   
                    echo "<td class='text-center'>".$row['ap_score']."</td>";
                    echo "<td class='text-center'>";
                    echo "<a class='btn btn-info' style='margin-right: 5px;' href='/Apply/Detailed/".$row['rg_id']."'>詳細</a>";

                    if($row['ap_is_pay'] == 0) {
                        echo "<a class='btn btn-primary' style='margin-right: 5px;'  target='_blank' href='/Apply/PrintPay/".$row['rg_id']."'>列印繳費單</a>";
                    }

                    if(now() <= nice_date($row['rg_applyEndDate'])) {
                       echo "<button class='btn btn-danger btn_apply_cancel' type='button' data-id='".$row['ap_id']."'>取消報名</button>";
                    } 
                    echo "</td>";
                    echo "</tr>" ;
                }
            }   
        ?>    
        </tbody>
    </table>   
</div>
