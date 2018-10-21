      <footer>
        <div class="box">

          <div class="footer-box wrapper">

          </div>
          <div class="copyright">
            Designed by <a href="http://www.alexwebsoft.net">AlexWEBSoft<small>.net</small></a> &copy 2018. - All rights reserved.
          </div>
        </div>
      </footer>

    </div>

    <script type="text/javascript">
      var slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
      showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
      showSlides(slideIndex = n);
      }

      function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
      }
    </script>

<!-- Scripta za potvrdu istovetnosti lozinke pri ponavljanju -->

    <script type="text/javascript">
      var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Niste ukucali istu lozinku");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
    </script>

    <script type="text/javascript">
      function zanatLokacija(selectObject){
        var lokacija = selectObject.value;
        window.location.href = "pretraga.php?zanat=<?php echo $zanat; ?>&lokacija=" + lokacija;
      }
    </script>

    <script>
      $('span.nav_btn').click(function(){
        $('ul.nav').toggleClass('responsive');
      })
		</script>

  </body>
</html>
