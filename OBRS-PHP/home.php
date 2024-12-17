<style>
    body {
    background-image: url(./assets/img/bsimgstat.png) ;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
}
    </style>
<section id="" class="d-flex align-items-center">
    <div class="container">
    <center>
      <br>
    <h1 class="highlight">Online Bus Reservation System</h1></center>
      <?php if(!isset($_SESSION['login_id'])): ?>
      	<center><button class="btn btn-danger btn-lg" type="button" id="book_now">Reserve Your Tickets Now</button></center>
      <?php else: ?>
        
		<center><br><br><br><h2 class="highlight2">Welcome, <?php echo $_SESSION['login_name'] ?></h2></center>
	
      <?php endif; ?>
    </div>
  </section>
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>