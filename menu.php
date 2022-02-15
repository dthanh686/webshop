<?php

/**
 * gọi file autoload
 */
require_once __DIR__ . "/autoload/autoload.php";

	$navactive = "tin-tuc.php";
if(isset($_GET['id']) && $_GET['id'] != '')
{
	$id = $_GET['id'];
	$id = intval($id);
}

if(isset($_GET['page']))
{
	$p = $_GET['page'];
}
else
{
	$p = 1;
}

/**
 *  lấy danh sách sản phẩm
 */
$sql = " SELECT tintuc.*, menu.tenmenu as tenmenu FROM tintuc
     LEFT JOIN menu ON menu.id = tintuc.menu_id
     WHERE menu_id = ". $id . " ORDER BY id DESC";


$tintuc = $db->fetchJone("tintuc",$sql,$page = $p,6,true);
if(isset($tintuc['page']))
{
	$sotrang =  $tintuc['page'];
	unset($tintuc['page']);
}
?>
<?php  require_once __DIR__ . "/include/header.php"; ?>

	<div id="maincontent">
	<div class="breadcrumbs theme-clearfix">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home </a><span class="divider"></span></li>
				<li class="active"><span> Tin tức  </span></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<?php  require_once __DIR__ . "/include/left.php"; ?>
		<div class="col-md-9 bor" id="tintuc">
			<section>
				<?php foreach($tintuc as $item) :?>
					<div class="col-md-12">
						<a href="tin-tuc-chi-tiet.php?id=<?php echo $item['id'] ?>-<?php echo $item['slug'] ?>">
							<img src="<?php echo base_url() ?>public/uploads/post/<?php echo $item['hinhanh'] ?>" class="img-responsive pull-left " width="160" height="160">
							<div class="info pull-right  post">
								<p class="names" style="margin-top: -10px">
									<a href="tin-tuc-chi-tiet.php?id=<?php echo $item['id'] ?>-<?php echo $item['slug'] ?>"><?php echo $item['tieude'] ?></a>
								</p >
								<p style="padding-top: 10px;padding-bottom: 10px; line-height: 30px;font-size: 13px;"><?php echo substr($item['noidung'] , 0 ,401)."....." ?></p>
								<?php if ($item['tenmenu']) :?>
									<a href="#" class="btn btn-primary" style="display: inline-block;padding: 5px 10px;border-radius: 10px;margin-top: 10px;"><?= $item['tenmenu'] ?></a>
								<?php endif ;?>
							</div>
						</a>
					</div>
				<?php endforeach ; ?>
				<nav aria-label="Page navigation" class="clearfix text-center">

					<ul class="pagination" >
						<li>
							<a href=""  aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>

						<?php for(  $i = 1 ; $i <= $sotrang ; $i++ ) : ?>
							<?php
							if(isset($_GET['page']))
							{
								$p = $_GET['page'];
							}
							else
							{
								$p = 1;
							}
							?>
							<li class="<?php echo ($i == $p) ? 'active' : ''  ?>">

								<a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
							</li>
						<?php endfor; ?>

						<li>
							<a href="" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>

					</ul>
				</nav>
			</section>

		</div>
	</div>

	<div class="container" style="margin-top: 20px">
		<div class="col-md-4 bottom-content">
			<a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
		</div>
		<div class="col-md-4 bottom-content">
			<a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
		</div>
		<div class="col-md-4 bottom-content">
			<a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
		</div>
	</div>
<?php  require_once __DIR__ . "/include/footer.php"; ?>