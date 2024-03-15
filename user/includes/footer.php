<footer>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <table>
                <tr>
                  <td align-items="left">
              
              
              <h3>About Us</h3>
              <p>We are a team of creative professionals dedicated to providing <br>high-qualit
            </div>
          </td>
            <td align-items="center">
            <div class="col-md-4">
                <h3>Quick Links</h3>
                      <ul>
                          <li><a href="index.php">Home</a></li>
                           <li><a href="profile.php">profile</a></li>
                           <li><a href="portfolio.php">Portfolio</a></li>
                           <li><a href="contact.php">Contact Us</a></li>
                        </ul>
            
            </div>
            </td>
            <td align-items="right" margin-right="30px">
            <div class="col-md-4" width="200px">
              <h3>Follow Us</h3>
              <div class="social-icons">
                <li> <a href="#"><i class="fa fa-facebook"></i></a>Facebook</li>
                <li> <a href="#"><i class="fa fa-twitter"></i></a>Twitter</li>
                <li> <a href="#"><i class="fa fa-linkedin"></i></a>LinkedIn</li>
                <li> <a href="#"><i class="fa fa-instagram"></i></a>Instagram</li>
              </div>
            </div>
            </td>
          </tr>
        </table>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="copy">
                <p>&copy; 2023 My Website. All Rights Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top -->
</body>
</html>
