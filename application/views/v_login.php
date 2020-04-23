<section class="py-5">
  <div class="container col-lg-6 main-div" style="margin-bottom : 180px">
  <center>
    <form action="<?= site_url('auth/login') ?>" method="post">
		<h2>Login</h2>
		
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