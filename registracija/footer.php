    <div class="footer-line">
        <div class="logo-nav wrapper">
            <nav>
              <ul>
                <li><a href="mailto: #">KONTAKT</a></li>
              </ul>
            </nav>
        </div>
    </div>

  </div>

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

</body>
</html>
