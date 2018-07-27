<?php
function isAuth() {
  session_start();
  
  if ( !isset( $_SESSION[ 'username' ] ) || empty( $_SESSION[ 'username' ] ) ) {
    return FALSE;
  }
  
  $host_name = "";
  $database = "";
  $user_name = "";
  $pwd = "";
  
  $connect = mysqli_connect( $host_name, $user_name, $pwd, $database );
  $username = $_SESSION[ 'username' ];
  
  $sql = "SELECT * FROM Users WHERE username='" . $_SESSION['username'] . "'";
  $result = mysqli_query( $connect, $sql );
  
  if ( mysqli_num_rows( $result ) != 1 ) {
    return FALSE;
  }

  return TRUE;
}

?>