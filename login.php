<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<div id="login-container">
  <div id="login-box">
    <div>
      <h2>Academic Advising & Career Centre</h2>
      <h3>Mediabank</h3>
    </div>
    <form>
      <input class="form-control" type="text" placeholder="Username">
      <input class="form-control" type="password" placeholder="Password">
    </form>
    <button id="login-button" class="btn btn-primary">Login</button>
  </div>
</div>
<style>
  #login-container {
    display: flex;
    height:100%;
    width:100%;

    justify-content: center;
    align-items: center;
  }

  #login-box {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    
    padding: 20px;
    height: 30%;
    border-radius: 17px;

    background-color: white;
    -webkit-box-shadow: 1px 3px 20px 0px #88888836;
    box-shadow: 1px 3px 20px 0px #88888836;

    font-family: "Lato", Arial, Helvetica, sans-serif;
  }

  h2 {
    font-size: 20px;
    font-weight: 200 !important;
  }

  h3 {
    font-size: 18px;
    font-weight: 200 !important;
  }

  input[type="text"] {
    margin-bottom:17px;
  }
</style>