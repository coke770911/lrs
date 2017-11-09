<style>
    .bankDiv {
        width:720px;
    }

    .bankTable {
        border-collapse: collapse;
        width:680px;
        font-size: 16px;
        text-align:center;
        font-family:標楷體;
    }

    .receiptTable {
        border-collapse: collapse;
        width:710px;
        font-size: 16px;
        text-align:center;
        font-family:標楷體;
        line-height: 30px;
    }

    /*變小字*/
    .smallText{
        font-size: 12px;
    }

    /*銀行帳號填寫寬度*/
    .accountNumberWidth{
        width:20px;
    }

    /*$$填寫寬度*/
    .moneyNumberWidth{
        width:30px;
    }

    /*靠左對齊之欄位*/
    .leftText{
        text-align:left;
    }
    
    /*靠上對齊之欄位*/
    .topText{
        vertical-align:text-top;
    }
    
    /*左虛線*/
    .leftdashLine{
        border-left:1px dashed #000
    }

    /*右虛線*/
    .rightdashLine{
        border-right:1px dashed #000
    }
    
    /*域設全部樣式*/
    table, th, td {
        border: 1px solid #000;
    }
</style>
﻿<html>
    <div class="bankDiv">
        <table class="bankTable" style="width: 10px;float:right;" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="border: 1px solid #FFF;border-bottom: 1px solid #000;">
                    備註
                </td>
            </tr>
            <tr style="height:200px;">
                <td style="width: 10px;vertical-align:text-top;border: 1px solid #FFF;">
                    二<BR>、<BR>存<BR>入<BR>票<BR>據<BR>須<BR>俟<BR>收<BR>妥<BR>後<BR>始<BR>可<BR>抵<BR>用
                </td>
                <td style="width: 10px;vertical-align:text-top;border: 1px solid #FFF;">
                    一<BR>、<BR>票<BR>據<BR>、<BR>現<BR>金<BR>應<BR>分<BR>別<BR>另<BR>張<BR>填<BR>寫
                </td>
            </tr>
        </table>

        <table class="bankTable">
            <td colspan="17" style="border: 1px solid #FFF;border-bottom: 1px solid #000;">
                <img src="/lrs/public/images/feib.png" height="50">
                <div width="100%" class="smallText" style="text-align:right;" >
                    年&nbsp&nbsp&nbsp&nbsp&nbsp月&nbsp&nbsp&nbsp&nbsp&nbsp日
                </div>
            </td>
            <tr>
                <td rowspan="2">
                    帳<BR>號
                </td>
                <td colspan="3">
                    單位別
                </td>
                <td colspan="3">
                    科目
                </td>
                <td colspan="7">
                    編號
                </td>
                <td >
                    檢
                </td>
                <td rowspan="2">
                    戶<BR>名
                </td>
                <td rowspan="2" class="leftText" style="font-size:20px;font-weight: bold;">
                    亞東技術學院
                </td>
                <td rowspan="2" style="width:20px;border: 1px solid #FFF;border-left: 1px solid #000;" >
                    第一聯
                </td>
            </tr>
            <tr>
                <td class="accountNumberWidth rightdashLine">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    9
                </td>
                <td class="accountNumberWidth rightdashLine">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    4
                </td>
                <td class="accountNumberWidth rightdashLine ">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    0
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    5
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    1
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    3
                </td>
                <td class="accountNumberWidth rightdashLine leftdashLine">
                    8
                </td>
                <td class="accountNumberWidth leftdashLine">
                    0
                </td>
                <td class="accountNumberWidth ">
                    5
                </td>

            </tr>
        </table>
        <table class="bankTable">
            <tr>
                <td colspan="4">
                    身分證字號/統一編號<BR><span class="smallText">(信用卡用)</span>
                </td>
                <td colspan="8">

                </td>
                <td rowspan="5" class="topText">
                    (收訖戳記)<br><br><br><br><br><br>
                    <span style="font-size: 14px">繳款期限：<?php echo (nice_date($rg['rg_applyEndDate'], 'Y') - 1911) . nice_date($rg['rg_applyEndDate'], '/m/d')?></span>
                </td>
                <td rowspan="5" class="topText" style="width:20px;border: 1px solid #FFF;border-left: 1px solid #000;">
                    ：銀行存查
                </td>
            </tr>
            <tr>
                <td rowspan="2" width="70px">
                    新臺幣<BR>
                    NT$
                </td>
                <td class="moneyNumberWidth">
                    佰
                </td>
                <td class="moneyNumberWidth">
                    拾
                </td>
                <td class="moneyNumberWidth">
                    億
                </td>
                <td class="moneyNumberWidth" >
                    仟
                </td>
                <td class="moneyNumberWidth" >
                    佰
                </td>
                <td class="moneyNumberWidth" >
                    拾
                </td>
                <td class="moneyNumberWidth" >
                    萬
                </td>
                <td class="moneyNumberWidth" >
                    仟
                </td>
                <td class="moneyNumberWidth" >
                    佰
                </td>
                <td class="moneyNumberWidth" >
                    拾
                </td>
                <td class="moneyNumberWidth" >
                    元
                </td>

            </tr>
            <tr style="height:40px;">
                <td class="rightdashLine" >
                    <?php echo $numArr[10];?>
                </td>
                <td class="leftdashLine">
                    <?php echo $numArr[9];?>
                </td>
                <td class="rightdashLine">
                    <?php echo $numArr[8];?>
                </td>
                <td class="leftdashLine rightdashLine">
                    <?php echo $numArr[7];?>
                </td>
                <td class="leftdashLine">
                    <?php echo $numArr[6];?>
                </td>
                <td class="rightdashLine">
                    <?php echo $numArr[5];?>
                </td>
                <td class="leftdashLine rightdashLine">
                    <?php echo $numArr[4];?>
                </td>
                <td class="leftdashLine">
                    <?php echo $numArr[3];?>
                </td>
                <td class="rightdashLine">
                    <?php echo $numArr[2];?>
                </td>
                <td class="leftdashLine rightdashLine">
                    <?php echo $numArr[1];?>
                </td>
                <td  class="leftdashLine">
                    <?php echo $numArr[0];?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    存款方式
                </td>
                <td colspan="8" class="leftText">
                    □現金 □轉帳 □票據______張
                </td>

            </tr>
            <tr>
                <td colspan="12" class="leftText">繳款人學號：<u><?php echo $apply_data["ap_us_no"] ?></u></td>
            </tr>
        </table>
        <table class="bankTable">

            <tr style="height:30px;">
                <td rowspan="2">
                    機<BR>
                    器<BR>
                    印<BR>
                    錄
                </td>
                <td>
                    分別行
                </td>
                <td>
                    櫃台機
                </td>
                <td>
                    序時編號
                </td>
                <td>
                    交易序號
                </td>
                <td>
                    櫃員
                </td>
                <td>
                    主管
                </td>
                <td>
                    日期
                </td>
                <td>
                    時間
                </td>
                <td>
                    帳號
                </td>
                <td rowspan="2" style="width:20px;border: 1px solid #FFF;border-left: 1px solid #000;">

                </td>
            </tr>
            <tr style="height:100px;">
                <td colspan="9">

                </td>
            </tr>
            <tr >
                <td colspan="4" class="leftText smallText" style="border: 1px solid #FFF;border-top: 1px solid #000;">
                    P20 / P30 / K20 / T20 / J19 二聯式<BR>
                    103.10(宏宇)
                </td>
                <td colspan="6" class="leftText " style="border: 1px solid #FFF;border-top: 1px solid #000;">
                    主管　　　　　　　　經辦
                </td>
            </tr>
        </table>
    </div>
    <br>
    <table class="receiptTable" >
        <tr >
            <td colspan="4" class="leftText" style="border: 1px solid #FFF;border-bottom: 1px solid #000;" >
                第一聯　板橋南雅分行收款留存
            </td>

        </tr>
        <tr>
            <td rowspan="2" style="width:70px;">
                繳款人
            </td>
            <td class="leftText" style="width:233px;border-right:1px #FFF solid;border-bottom:1px #FFF solid;">
                姓名：<u><?php echo $apply_data["ap_us_name"] ?></u>
            </td>
            <td class="leftText" style="width:233px;border-bottom:1px #FFF solid;">
                學號：<u><?php echo $apply_data["ap_us_no"] ?></u>
            </td>
           
        </tr>
        <tr>
            <td class="leftText" style="border-right:1px #FFF solid;">
                行動電話：<u><?php echo $apply_data["ap_us_phone"] ?></u>
            </td>
            <td class="leftText">
                E-Mail：<u><?php echo $apply_data["ap_us_email"] ?></u>
            </td>
        </tr>

    </table>

    <hr style="border-style: dashed;">
    <table class="receiptTable" >
        <tr >
            <td colspan="4" class="leftText" style="border: 1px solid #FFF;border-bottom: 1px solid #000;">
                亞東技術學院　　收款收據
            </td>

        </tr>
        <tr>
            <td  style="width:70px;">
                繳款人
            </td>
            <td class="leftText" style="width:233px;border-right:1px #FFF solid;">
                姓名：<u><?php echo $apply_data["ap_us_name"] ?></u>
            </td>
            <td class="leftText" style="width:233px;">
                學號：<u><?php echo $apply_data["ap_us_no"] ?></u>
            </td>
            <td rowspan="3" class="topText" style="width:100px;">
                經收單位<BR>收訖戳記
            </td>
        </tr>

        <tr>
            <td>
                金額
            </td>
            <td class="leftText" style="width:233px;border-right:1px #FFF;">新台幣 <u><?php echo $this->tools->num2Zh($apply_data["ap_rg_money"]) ?> 元</u>整</td>
            <td class="leftText" style="width:233px;border-left:1px #FFF;">NT$：<u><?php echo  number_format($apply_data["ap_rg_money"],1) ?></u></td>
        </tr>
        <tr>
            <td>
                收費<BR>
                項目
            </td>
            <td colspan="2" class="leftText">
                代收<?php echo $apply_data["ap_rg_name"] ?><br>
                「<?php echo $apply_data["ap_le_name"] ?>」證照認證考試報名費
            </td>
        </tr>
        <tr >
            <td colspan="4" class="leftText" style="border: 1px solid #FFF;border-top: 1px solid #000;">
                第二聯　請交繳款人自行留存
            </td>
        </tr>
    </table>
    <BR>
    <div style="font-family:標楷體;">
        校長：黃茂全　　　主辦會計：潘明岳　　　主辦出納：馮靜芳　　　經收人：
    </div>
    <BR>
    <div style="text-align:right;color:#FF0000">
        本收款收據需經遠東國際商銀加蓋收款戳記後始生效
    </div>

</html>