<?php
session_start();

if ( !isset( $_SESSION[ 'username' ] ) || empty( $_SESSION[ 'username' ] ) ) {
	header( 'Location: login.php' );
}

$host_name = "localhost:8889";
$database = "mediabank";
$user_name = "root";
$pwd = "root";

$connect = mysqli_connect( $host_name, $user_name, $pwd, $database );
$username = $_SESSION[ 'username' ];

$sql = "SELECT * FROM Users WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query( $connect, $sql );

if ( mysqli_num_rows( $result ) != 1 ) {
	header( 'Location: login.php' );
}

?>