//function bind
$('#login').click(function(){
    $uid = $("input[name=username]").val();
    $pwd = $("input[name=password]").val();
    $.post("/lrs/User/login",{"username":$uid,"password":$pwd},function(data){
        if(data.code != '0') {
            alert(data.msg);
            location.reload();
        } else {
            alert(data.msg);
        }
        
        
    },"json").fail(function(){
        alert("發生錯誤！");
    });
});

$('#logout').click(function(){
    $.getJSON("/lrs/User/logout","",function(data) {
        if(data.code != '0') {
            alert(data.msg);
            location.reload();
        } else {
            alert(data.msg);
        }
    }).fail(function(){
        alert("發生錯誤！");
    });

});

$('#btn_apply_submit').click(function() {
    $.post("/lrs/Apply/addProcess",$('#formData').serialize(),function(data){
        if(data.code != '0') {
            alert(data.msg);
            location.replace("/lrs/Apply/historyList");
        } else {
            alert(data.msg);
        }
    },"json").fail(function(){
        alert("發生錯誤！");
    });
});

$('.btn_apply_cancel').click(function() {
    $this = $(this);
    $id = $this.data("id");
    if($id == '') {
        alert('查無此申請！');
        return 0;
    }

    if(confirm("請再次確認是否取消報名")) {
        $.post("/lrs/Apply/cancel",{id:$id},function(data) {
            if(data.code != '0') {
                alert(data.msg);
                location.reload();
            } else {
                alert(data.msg);
            }
            
        },"json").fail(function(){
            alert("發生錯誤！");
        });
    }
    
});

$('#btn_apply_edit_submit').click(function() {
    $.post("/lrs/Apply/editProcess",$('#formData').serialize(),function(data){
        if(data.code != '0') {
            alert(data.msg);
            location.replace("/lrs/Apply/historyList");
        } else {
            alert(data.msg);
        }
    },"json").fail(function(){
        alert("發生錯誤！");
    });
});

$('#btn_addItem_submit').click(function(){
    $.post("/lrs/Manage/addItemProcess",$('#formData').serialize(),function(data){
        if(data.code != '0') {
            alert(data.msg);
            location.reload();
        } else {
            alert(data.msg);
        }
    },'json').fail(function(){
        alert("發生錯誤！");
        location.reload();
    });
})





$('#btn_addTheme_submit').click(function() {
    $.post("/lrs/Manage/addThemeProcess",$('#formData').serialize(),function(data){
       if(data.code != '0') {
            alert(data.msg);
            location.href = "/lrs/Manage/"
        } else {
            alert(data.msg);
        }
    },'json').fail(function(){
        alert("發生錯誤！");
    });
})

$('input[name=rg_number]').keyup(function () {
        this.value = this.value.replace(/[^0-9\.-]/g, '');
});


$('input[name=rg_money]').keyup(function () {
    this.value = this.value.replace(/[^0-9\.-]/g, '');
});

//控制Item呈現
$('#sel_lg_group').change(function(){
    $this = $(this);
    $('#lg_item').load('/lrs/Manage/selItem/'+$this.val());
})

//控制選項New Add
$('#btn_addItem').click(function(){
    var $tag_element = $("#lg_item option:selected");
    if($tag_element.val() === "0") {
        return 0;
    }
    
    var $label = $('<label>')
    $label.text($tag_element.text());
    var $input = $('<input class="chKSelVal" type="hidden" name="item[]">');

    $input.val($tag_element.val());


    var $a_link = '<a><span class="glyphicon glyphicon-remove"></span><a>';
    var $div_radio = $('<div class="col-xs-12 radio">');
    $div_radio.append($label).append($input).append($a_link);
    var $div = $('<div class="row">').append($div_radio);

    var chkVal = true;
    $('.chKSelVal').each(function(){
        $this = $(this);
        if($this.val() == $tag_element.val()) {
            chkVal = false;
        }
    })
    if(chkVal) {
        $("#itemContent").append($div);
    }
})


$("#itemContent").on("click",'.glyphicon-remove',function(){
    $this = $(this);
    $this.parents('.row').remove();
})

$(function(){
    $('.datainput').appendDtpicker({
        "closeOnSelected": true
    });
});

$("#lg_item_check").click(function(){
    $this = $(this);
    $('#item_check_list').load('/lrs/Manage/selItem/'+$this.val());
})
