<div class="container">
    <h1>證照報名列表</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" width="4%">#</th>
                <th class="text-center">證照名稱</th>
                <th class="text-center">考試時間</th>
                <th class="text-center">報名截止日</th>
                <th class="text-center">已報名人數</th>
                <th class="text-center">報名人數限制</th>
                <th class="text-center">功能</th>
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
                    echo "<td class='text-center'>".$row['rg_nowNumber']."</td>";
                    echo "<td class='text-center'>".$row['rg_number']."</td>";
                    if(now() <= nice_date($row['rg_applyEndDate'])) {
                        echo "<td class='text-center'><a class='btn btn-default btn_apply' href='/apply/applyData/".$row['rg_id']."'>報名</a></td>";
                    } else {
                        echo "<td class='text-center'>報名結束</td>";
                    }
                    echo "</tr>" ;
                }
            }
        ?>    
        </tbody>
    </table>   
</div>
