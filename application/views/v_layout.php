<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.dataTables.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">

</head>
<body>

<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/img/logoHi.png" width="1000px" alt=""></a>	
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
								
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?= site_url('home') ?>">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?= site_url('home/counselling') ?>">Counselling</a>
								</li>
								<?php if(!$this->session->userdata('logged_in')) {?>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?= site_url('home/login') ?>">Login</a>
								</li>
								<?php } else{ 
											if($this->session->userdata('role') =="admin"){
											?>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="<?= site_url('home/menuAdmin') ?>">Menu Admin</a>
											</li>
											<?php } else{ 	?>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="<?= site_url('home/myappointment') ?>">My Appointment</a>
											</li>
											<?php }  ?>

									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="<?= site_url('auth/logout') ?>">Logout</a>
									</li>
									<?php }  ?>
                                <!-- 
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Item1</a>
										<a class="dropdown-item" href="#">Item2</a>
									</div>
								</li>
                                
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="#">Menu</a>
								</li> 
                                -->
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
    </div>
    
    <?php $this->load->view($main_view); ?>
  
<div class="mini-footer footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>© 2020
              <a href="<?= base_url() ?>">Hi Psikolog</a>. All rights reserved.
            </p>
          </div>

          <div class="go_top">
            <span class="icon-arrow-up"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/style.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.min.js"></script>


<script type="text/javascript">
  $(document).ready( function () {
	$('#table').DataTable();
});

function notifAlert(notif,type){
	if(notif != ""){
		Swal.fire({
		icon: type,
		// title: 'Oops...',
		text: notif,
		//   footer: '<a href>Why do I have this issue?</a>'
		});
	}
}
</script>
<?php if(!empty($this->session->flashdata('notif'))) { 
			if(empty($this->session->flashdata('type'))){
				$type = "error";
			} else{
				$type = $this->session->flashdata('type');
			}?>
	<script>
	notifAlert("<?= $this->session->flashdata('notif'); ?>","<?= $type ?>");
	</script>
<?php } ?>
</body>
</html>