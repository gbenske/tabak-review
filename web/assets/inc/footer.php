	<footer>
		<div class="wrapper">
		</div>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-form input[type="text"]').on("keyup input", function(){
					/* Get input value on change */
					var inputVal = $(this).val();
					var resultDropdown = $(".results");
					if(inputVal.length){
						$.get("fetch.php", {term: inputVal}).done(function(data){
							// Display the returned data in browser
							resultDropdown.html(data);
						});
						$('section#all-products').addClass('search');
					} else{
						resultDropdown.empty();
						$('section#all-products').removeClass('search');
					}
				});
				
				// Set search input value on click of result item
				$(document).on("click", ".results", function(){
					$(this).parents(".search-form").find('input[type="text"]').val($(this).text());
					$(".results").empty();
				});
			});
			</script>
			<script src="/web/assets/js/shuffle.min.js"></script>
			<script src="/web/assets/js/sort.js"></script>
		<script type="text/javascript" src="/web/<?php echo $assets['assets/dist/js/main.js'] ?>"></script>
	</footer>
    </body>
</html>