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
});

$('#btn_apply_edit_submit').click(function() {
    console.dir("A");
});