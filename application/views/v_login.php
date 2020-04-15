<header>

</header>
<section class="py-5">
  <div class="container">
    <form action="<?= site_url('home/login') ?>" method="post">
		<h2>Login</h2>
	    <?php if(isset($error_message)) { ?>
	    <div class="alert alert-danger" role="alert">
		    <?= $error_message ?>
	    </div>
	    <?php } ?>
	    <div class="form-group">
		    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
	    </div>
	    <div class="form-group">
	        <input type="password" class="form-control" name="password" placeholder="Password" required>
	    </div>
	    <button type="submit" class="btn btn-primary">Login</button>
	    <p>Don't have an account? Register <a href="<?= site_url('home/register') ?>">here</a></p>
    </form>
  </div>
</section>