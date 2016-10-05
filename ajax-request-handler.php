<?php

/* -- Parameter verification functions -- */

function areParametersValid( $parameters ) {

  if( !is_array( $parameters ) ) $parameters = array( $parameters );

  foreach ( $parameters as $parameter ) {

    $isNotValid = !isset( $_POST[$parameter] ) || $_POST[$parameter] == '';

    if ( $isNotValid ) return false;

  }

  return true;

}

function isParameterValid( $parameter ) {

  $isValid = isset( $_POST[$parameter] ) && $_POST[$parameter] != '';
  return $isValid;

}

/* -- Communication control functions -- */

function printData( $data = 'null' ) {

  print( json_encode( [ 'success' => 'true', 'data' => $data ] ) );
  exit();

}

function printError( $errorDescription ) {

  print( json_encode( [ 'success' => 'false', 'errorDescription' => $errorDescription ] ) );
  exit();

}

/* -- Procedural functions -- */

function createSession() {

  session_start();

  $_SESSION['session'] = [
    'name' => 'Erick Alejandro Montañez Sodá'
  ];

}

function authenticateUser() {

  $isEmptyLoginData = !areParametersValid( ['username', 'password'] );
  if ( $isEmptyLoginData ) printError( 'Error de comunicación: No se han recibido los datos necesarios para iniciar sesión.' );
  else {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }

  $isLoginDataValid = $username == '1727' && $password == '123123';

  if ( $isLoginDataValid ) {
    createSession();
    printData( true );
  } else printError( 'Clave de profesor o contraseña incorrectos.' );

}

/* -- Request type switch -- */

if ( isParameterValid( 'requestType' ) ) $requestType = $_POST['requestType'];
else printError( 'Error de comunicación: No se ha especificado un tipo de solicitud.' );

switch( $requestType ) {
  case 'authenticateUser': authenticateUser(); break;
  default: printError( 'Error de comunicación: Se desconoce el tipo de solicitud especificada.' ); break;
}
