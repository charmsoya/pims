<!-- layouts for pims -->

<html>    
	<!-- necessary css & js -->
	<head>
		<link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
		<link href="/css/pims.css" rel="stylesheet" id="bootstrap-css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
		<title>李窦哲先生的网站</title>
	</head>

	<!-- body content-->
	<body>
		<!-- navigation bar-->
<?php
$menu_home = "";
$menu_achievements = "";
$menu_courses = "";
$menu_notes = "";
$menu_order = "";

if (!strcmp($menu,"home")) $menu_home="active"; 
if (!strcmp($menu,"achievements")) $menu_achievements="active";
if (!strcmp($menu,"courses")) $menu_courses="active"; 
if (!strcmp($menu,"notes")) $menu_notes="active"; 
if (!strcmp($menu,"order")) $menu_order="active";
?>
		<nav class="navbar navbar-expand-md" style="background-color: #e3f2fd;">
			<a class="navbar-brand" href="/"><img src = '/img/logo.gif' style="max-height:40px;" ></img></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse  justify-content-center" id="navbarNavDropdown">
				<ul class="nav nav-pills">
					<li class="nav-item">
					<a class="nav-link <?php echo($menu_home)?>" href="<?php echo ( URL::to('/') ); ?>">{{ trans('layouts.home') }}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo($menu_achievements)?>" href="<?php echo ( URL::to('/achievements') ); ?>">{{ trans('layouts.achievements') }}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo($menu_courses)?>" href="<?php echo ( URL::to('/courses') ); ?>">{{ trans('layouts.course') }}</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle <?php echo($menu_notes)?>" href="<?php echo ( URL::to('/notes') ); ?>" >{{ trans('layouts.notes') }}
						</a> <span id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
						
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">无线通信</a>
							<a class="dropdown-item" href="#">图像/信号处理</a>
							<a class="dropdown-item" href="#">模式识别</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo($menu_order)?>" href="<?php echo ( URL::to('/order') ); ?>">{{ trans('layouts.affairs') }}</a>
					</li>
					<li class="dropdown">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						<img src="/img/qrcode.jpg" style="max-height:40px;" >{{ trans('layouts.wechat') }} 
    <ul class="dropdown-menu"></a>
        <img src="/img/qrcode.jpg" >
    </ul>
</li>
				</ul>
			</div>
			<span class="navbar-text">
			{{ trans('layouts.have_accout') }} &nbsp;	
			</span>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ trans('layouts.login') }} </a>
					<ul id="login-dp" class="dropdown-menu dropdown-menu-right">
						<li>
							<div class="row">
								<div class="col-md-12">
									用社交账号
									<div class="social-buttons">
										<a href="#" class="btn btn-fb"><i class="fa fa-qq"></i> QQ</a>
										<a href="#" class="btn btn-tw"><i class="fa fa-wechat"></i> 微信</a>
									</div>
									或 
									<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											<label class="sr-only" for="exampleInputEmail2">Email address</label>
											<input type="email" class="form-control" id="exampleInputEmail2" placeholder="邮箱" required></input>
										</div>
										<div class="form-group">
											<label class="sr-only" for="exampleInputPassword2">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword2" placeholder="密码" required>
											<div class="help-block text-right"><a href="">忘记密码？</a></div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">登陆</button>
										</div>
										<div class="checkbox">
											<input type="checkbox"> 保持登陆 </input>
										</div>
									</form>
								</div>
								<div class="bottom text-center">
									第一次来？<a href="/signup"><b>加入</b></a>
								</div>
							</div>
						</li>
					</ul>
				</li>
&nbsp;&nbsp;&nbsp;
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" >{{ trans('layouts.languages') }}</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="/en" style="min-width: 40px;">{{ trans('layouts.lan_en') }}</a>
						<a class="dropdown-item" href="/zh_cn" style="min-width: 40px;">{{ trans('layouts.lan_cn') }}</a>
					</div>
				</li>
			</ul> 

		</nav>

		<div class="container">
			@yield('content')
		</div>

		<footer class="container-fluid foot-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-4 text-center">© 2017-2019 Dr. Douzhe Li All rights reserved.</div>
					<div class="col-md-4 text-center"><a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action">晋ICP备18007010号</a></div>
					<div class="col-md-4 text-center">Powered by <a href="https://laravel.com/">Laravel</a></div>
				</div>
			</div>
		</footer>
	</body>
</html>
