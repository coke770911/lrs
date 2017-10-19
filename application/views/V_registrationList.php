<div class="container">
    <h1>證照報名列表</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>證照項目</th><th>考試時間</th><th>報名截止日</th><th>考照人數限制</th><th>功能</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $i = 1;
            foreach($list as $row) {
                echo "<tr>" ;
                echo "<td>".$i++."</td>";
                echo "<td>".$row['rg_name']."</td>";


                echo "<td>".$this->tools->date_f($row['rg_startDate'])." ~ ".$this->tools->date_f($row['rg_endDate'])."</td>";
                echo "<td>".$this->tools->date_f($row['rg_applyEndDate'])."</td>";
                echo "<td>".$row['rg_number']."</td>";
                echo "<td><a class='btn btn-default btn_apply' href='/lrs/Registration/apply/".$row['rg_id']."'>報名</a></td>";
                echo "</tr>" ;
            }
        ?>    
        </tbody>
    </table>   
</div>
