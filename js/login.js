(function () {
  var usernameInput = document.getElementById('username-input');
  var passwordInput = document.getElementById('password-input');
  var btnLogin = document.getElementById('login-button');

  var keyUpLogin = function () {
    event.preventDefault();
    if (event.keyCode === 13) {
      btnLogin.click();
    }
  }
  usernameInput.addEventListener("keyup", function(event) {
    keyUpLogin();
  });

  passwordInput.addEventListener("keyup", function(event) {
    keyUpLogin();
  });
  
  btnLogin.onclick = function () {
    var username = usernameInput.value;
    var password = passwordInput.value;

    $.post('api/users/read.php', { username, password }, function (res) {
      if (res == "Login Successful.") {
        window.location.href = 'index.php';
      }
    })
  }
})();