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
  
<div class="col-lg-10 offset-lg-1 pt-5 pb-5 bg-white text-light">
<center>
        <h2 style="color:black">Testimonials</h2>
    </center>
  <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;color:black">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active text-center p-4">
         
          <p class="mb-0"> Just love it! My romance problem was handled well and no judge for sure.
          </p>
          <footer class="blockquote-footer">Ms G.<cite title="Source Title"> Students</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
         
      </div>
      <div class="carousel-item text-center p-4">
         
          <p class="mb-0">  Recommended to take the counselling to solve our problem. The Psychologist is good at it.
          </p>
          <footer class="blockquote-footer">Mr A <cite title="Source Title"> Employee</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
           
      </div>
      <div class="carousel-item text-center p-4">
         
          <p class="mb-0">  Never get better services rather than here. Hi Psikolog is the best !
          </p>
          <footer class="blockquote-footer">Ms F <cite title="Source Title"> Teacher</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
           
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#client-testimonial-carousel" style="background-color:black" data-slide-to="0" class="active"></li>
      <li data-target="#client-testimonial-carousel" style="background-color:black" data-slide-to="1"></li>
      <li data-target="#client-testimonial-carousel" style="background-color:black" data-slide-to="2"></li>
    </ol>
  </div>
</div>
</section>
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
          <p class="card-text"><?= $cp->counsellingDuration ?> minutes</p>
        </div>
        <div class="back card-block">
        <h4 class="card-title"><?= $cp->counsellingName ?></h4>

          <p>
          <?= $cp->counsellingDesc ?>
        </p>

        <p class="text-muted">
          <?= $cp->counsellingDuration ?> minutes
          only <?= 'Rp ' . number_format($cp->counsellingPrice);  ?>
          </p>
          <a href="<?= site_url('home/requestAppointment/'.$cp->counsellingID) ?>" class="btn btn-outline-primary">Continue Counselling</a>
        </div>
      </div>
    </div>
<?php } ?>
   
  </div>
</div>
</section>