<!-- Footer -->
<footer class="page-footer font-small blue jumbotron"  style="margin-left: 11%; margin-right: 11%;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" >© 2020 Copyright:
    <a href="">Sports Event Reminder</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 	<script src="js/wow.min.js"></script>
 	<script src="js/jquery.countdown.min.js"></script>
 	<script type="text/javascript">
 		var myCount = $('[data-countdown]').data('countdown');
	  $('#getting-started').countdown(myCount, function(event) {
	    $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
	    $(this).html(event.strftime('<div><span>%D</span> <span>Days</span></div><div><span>%H</span> <span>Hours</span></div><div><span>%M</span> <span>Minutes</span></div><div><span>%S</span> <span>Seconds</span></div>'));
	  });
	  new WOW().init();
	</script>
 	

 	
</body>
</html>