@extends('layouts')

@section('content')
<?php
	$menu='home';
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="/img/a.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="/img/b.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="/img/c.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="col-md-4">
<img src="/img/admin.jpg" class="img-rounded" alt="admin">
</div>
</div>
<hr class="featurette-divider">

	<div class="row">
		<div class="col-md-6">
<!-- 新闻 课程 成果 工单 -->
<div class="card">
<h5 class="card-header">笔记</h5>
  <div class="card-body">

  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul> 
    <a href="#" class="card-link">更多</a>
  </div>
</div>	
		</div>
		<div class="col-md-6">
			<div class="card">
<h5 class="card-header">成果</h5>
  <div class="card-body">
     <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
    <a href="#" class="card-link">更多</a>
  </div>
</div>	
		</div>
	</div>
<span>&nbsp;</span>
	<div class="row">
		<div class="col-md-12">
<div class="card">
<h5 class="card-header">课程</h5>
  <div class="card-body">
      <ul class="list-group list-group-flush">
	<li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
    <a href="#" class="card-link">更多</a>
  </div>
</div>	
</div>

	</div>
</div>
<span>&nbsp;</span>
@endsection
