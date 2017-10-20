<div class="container">
    <h1>報名歷程</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr >
                <th class="text-center">#</th>
                <th class="text-center">證照名稱</th>
                <th class="text-center">證照項目</th>
                <th class="text-center">考試時間</th>
                <th class="text-center">報名截止日</th>
                <th class="text-center">考試費用</th>
                <th class="text-center">分數</th>
                <th class="text-center">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach($list as $row) {
                echo "<tr>" ;
                echo "<td class='text-center'>".$i++."</td>";
                echo "<td class='text-center'>".$row['ap_rg_name']."</td>";
                echo "<td class='text-center'>".$row['ap_le_name']."</td>";
                echo "<td class='text-center'>".$this->tools->date_f($row['rg_startDate'])." ~ ".$this->tools->date_f($row['rg_endDate'])."</td>";
                echo "<td class='text-center'>".$this->tools->date_f($row['rg_applyEndDate'])."</td>";
                echo "<td class='text-center'>".$row['ap_rg_money']."</td>";
                if($row['ap_score'] == -1) {
                    echo "<td class='text-center'>尚未輸入</td>";
                } else {
                    echo "<td class='text-center'>".$row['ap_score']."</td>";
                }
                echo "<td class='text-center'>";
                echo "<a class='btn btn-default btn_apply' href='/lrs/Apply/Detailed".$row['ap_id']."'>詳細</a>";
                echo "<button class='btn btn-default btn_apply_cancel' type='button' data='".$row['ap_id']."'>取消報名</button>";
                echo "</td>";
                echo "</tr>" ;
            }
        ?>    
        </tbody>
    </table>   
</div>