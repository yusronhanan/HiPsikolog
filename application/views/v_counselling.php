<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
   
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('<?= base_url() ?>assets/img/bannercounselling.jpg')">
        <!-- <div class="carousel-caption d-none d-md-block"> -->
        <div class="carousel-caption d-block h-100 align-items-center justify-content-center">

          <h2 style="margin-top:100px">Free Yourself from Personal Problems</h2> <br>
          <p class="lead">Get answers to all personal problems by consult your problem with a psychologist. 
          Just one step, you will be connected to our licensed and professional psychologist.</p>

        </div>
      </div>
    </div>
   
  </div>
</header>
<section class="py-5">
<div class="container main-div">
    <center>
        <h2>Counselling Package</h2>
    </center>
  <div class="row text-center main-div">
<?php foreach ($counsellingpackage as $cp) { ?>
    <div class="col-md-4 card-container">
      <div class="card card-flip">
        <div class="front card-block">
          <span class="card-img-top" style="font-size: 4em">
          <img src="<?= base_url().'assets/img/'.$cp->counsellingName ?>.png" width="170px" alt=""></span>

          <h4 class="card-title"><?= $cp->counsellingName ?></h4>
          <h6 class="card-subtitle text-muted">Duration</h6>
          <p class="card-text"><?= $cp->counsellingDuration ?></p>
        </div>
        <div class="back card-block">
        <h4 class="card-title"><?= $cp->counsellingName ?></h4>

          <p>
          <?= $cp->counsellingDesc ?>
        </p>

        <p class="text-muted">
          <?= $cp->counsellingDuration ?>
          only <?= 'Rp ' . number_format($cp->counsellingPrice);  ?>
          </p>
          <a href="#" class="btn btn-outline-primary">Continue Counselling</a>
        </div>
      </div>
    </div>
<?php } ?>
   
  </div>
</div>
</section>