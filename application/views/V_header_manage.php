<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>證照考試報名系統</title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/layout.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header style="margin-bottom: 70px;">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="/">證照考試報名系統</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                        <ul class="nav navbar-nav">
                            <li><a href="/Manage">證照考試列表</a></li>
                            <li><a href="/Manage/addTheme">新增證照考試</a></li>
                            <li><a href="/Manage/addItem">新增證照考試選項</a></li>
                        </ul>
                        <?php if($this->session->login === '1') { ?>
                        <form class="navbar-form navbar-right" id="logoutform" name="logoutform" method="POST" action="User/logout">
                            <label style="color: #FFF;padding-right: 20px;"><?php echo $this->session->us_name." ".$this->session->us_title.' 歡迎'; ?></label>
                            <button type="button" class="btn btn-primary" id="logout">登出</button>
                        </form>
                        <?php } else { ?>
                        <form class="navbar-form navbar-right" id="loginform" name="loginform" method="POST" action="User/login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="學號" name="username">
                                <input type="password" class="form-control" placeholder="密碼" name="password">
                            </div>
                            <button type="button" class="btn btn-primary" id="login">登入</button>
                        </form>
                        <?php } ?>        
                    </div>
                </div>
            </div>
        </nav>
    </header>