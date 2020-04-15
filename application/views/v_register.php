<header>

</header>
<section class="py-5">
  <div class="container">
    <form action="<?= site_url('home/register') ?>" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
	    <?php if(isset($error_message)) { ?>
	    <div class="alert alert-danger" role="alert">
		    <?= $error_message ?>
	    </div>
	    <?php } ?>
	    <div class="form-group">
		    <input type="text" class="form-control" name="clientName" placeholder="Username" required>
	    </div>
        <div class="form-group">
		    <input type="email" class="form-control" name="clientEmail" placeholder="E-mail" required>
	    </div>
	    <div class="form-group">
		    <input type="password" class="form-control" name="clientPassword" placeholder="Password" required>
	    </div>
	    <div class="form-group">
		    <input type="password" class="form-control" name="re-password" placeholder="Re-Enter Password" required>
	    </div>
        <div class="form-group">
		    <input type="text" class="form-control" name="clientPhoneNumber" placeholder="Phone Number" required>
	    </div>
	    <div class="input-group mb-3">
		    <div class="input-group-prepend">
			    <span class="input-group-text">Profile Picture</span>
		    </div>
		    <div class="custom-file">
			    <input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*' required>
			    <label class="custom-file-label text-left" for="uploadImage">Choose file</label>
		    </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Register</button>
	    <p>Already have an account? Login <a href="<?= site_url('home/login') ?>">here</a></p>
    </form>
  </div>
</section>
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script>
	$('.custom-file-input').on('change', function() { 
		let fileName = $(this).val().split('\\').pop(); 
		$(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>