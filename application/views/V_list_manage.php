<div class="container">
    <h1>證照報名列表</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" width="4%">#</th>
                <th class="text-center">證照名稱</th>
                <th class="text-center" width="15%">考試時間</th>
                <th class="text-center" width="12%">報名截止日</th>
                <th class="text-center" width="7%">狀態</th>
                <th class="text-center" width="7%">目前報名人數</th>
                <th class="text-center" width="7%">考照人數限制</th>
                <th class="text-center" width="30%">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if(count($list) > 0 ) {
                foreach($list as $row) {
                    echo "<tr>" ;
                    echo "<td class='text-center'>".$row['rg_id']."</td>";
                    echo "<td class='text-center'>".$row['rg_name']."</td>";
                    echo "<td class='text-center'>".nice_date($row['rg_startDate'], 'Y-m-d H:i')." ~ ".nice_date($row['rg_endDate'], 'Y-m-d H:i')."</td>";
                    echo "<td class='text-center'>".nice_date($row['rg_applyEndDate'], 'Y-m-d H:i')."</td>";
                    echo "<td class='text-center'>".($row['rg_is_del'] == 1 ? '下架' : '上架') ."</td>";
                    echo "<td class='text-center'>".$row['rg_nowNumber']."</td>";
                    echo "<td class='text-center'>".$row['rg_number']."</td>";
                    echo "<td class='text-center'>";
                    echo "<a class='btn btn-info btn_apply' href='/Manage/detailed/".$row['rg_id']."' style='margin-right: 5px;'>詳細</a>";
                    echo "<a class='btn btn-primary' style='margin-right: 5px;' href='/Manage/checkPay/".$row['rg_id']."'>繳費處理</a>";
                    echo "<a class='btn btn-warning' style='margin-right: 5px;' href='/Manage/inpScore/".$row['rg_id']."'>成績處理</a>";                   
                    echo "<a class='btn btn-success' style='margin-right: 5px;' target='_blank' download='excel' href='/Manage/exportList/".$row['rg_id']."'>名單匯出</a>";
                    echo "</td>";
                    echo "</tr>" ;
                }
            }
        ?>    
        </tbody>
    </table>   
</div>