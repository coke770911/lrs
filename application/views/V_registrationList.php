<div class="container">
    <h1>證照報名列表</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">證照項目</th>
                <th class="text-center">考試時間</th>
                <th class="text-center">報名截止日</th>
                <th class="text-center">考照人數限制</th>
                <th class="text-center">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $i = 1;
            foreach($list as $row) {
                echo "<tr>" ;
                echo "<td class='text-center'>".$i++."</td>";
                echo "<td class='text-center'>".$row['rg_name']."</td>";
                echo "<td class='text-center'>".$this->tools->date_f($row['rg_startDate'])." ~ ".$this->tools->date_f($row['rg_endDate'])."</td>";
                echo "<td class='text-center'>".$this->tools->date_f($row['rg_applyEndDate'])."</td>";
                echo "<td class='text-center'>".$row['rg_number']."</td>";
                echo "<td class='text-center'><a class='btn btn-default btn_apply' href='/lrs/Registration/apply/".$row['rg_id']."'>報名</a></td>";
                echo "</tr>" ;
            }
        ?>    
        </tbody>
    </table>   
</div>
