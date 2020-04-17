<section class="py-5">
  <div class="container col-lg-6 main-div">
  <center>
    <form action="<?= site_url('auth/login') ?>" method="post">
		<h2>Login</h2>
		<?php if(!empty($this->session->flashdata('notif'))) { ?>
	    <div class="alert alert-danger" role="alert">
		    <?= $this->session->flashdata('notif'); ?>
	    </div>
	    <?php } ?>
	    <div class="form-group">
		    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
	    </div>
	    <div class="form-group">
	        <input type="password" class="form-control" name="password" placeholder="Password" required>
	    </div>
		</center>
	    <button type="submit" class="btn btn-primary float-right">Login</button>
		<br><br>
	    <p>Don't have an account? Register <a href="<?= site_url('home/register') ?>">here</a></p>
    </form>
  </div>
</section>