(function () {
  var btnLogin = document.getElementById('login-button');
  document.URL = document.URL.replace(/^http:\/\//i, 'https://');
  btnLogin.onclick = function () {
    var username = document.getElementById('username-input').value;
    var password = document.getElementById('password-input').value;

    $.post('api/users/read.php', { username, password }, function (res) {
      if (res == "Login Successful.") {
        window.location.href = 'index.php';
      }
    })
  }
})();