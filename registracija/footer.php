      <div class="top-line">
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
      $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
          $('#message').html('Matching').css('color', 'green');
        } else
          $('#message').html('Not Matching').css('color', 'red');
      });
    </script>

  </body>
</html>
