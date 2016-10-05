

$( function() {

  /* -- DOM access variables -- */

  var Dom = {
    $uiLocker :       $( '.ui-locker' ),
    $errorMessage :   $( '.error-message' ),
    $formLogin :      $( '#login' ),
    $inputUsername : $( '#username' ),
    $inputPassword :  $( '#password' )
  };

  /* -- User Interface related functions -- */

  function lockUI() {
    Dom.$uiLocker.css( 'display', 'block' );
  };

  function unlockUI() {
    Dom.$uiLocker.css( 'display', 'none' );
  };

  function showErrorMessage( theMessage ) {
    hideErrorMessage();
    Dom.$errorMessage.text( theMessage );
    Dom.$errorMessage.show();
  };

  function hideErrorMessage() {
    Dom.$errorMessage.css( 'display', 'none' )
  };

  /* -- Procedural functions -- */

  function loginRequest() {

    var username = Dom.$inputUsername.val();
    var password = Dom.$inputPassword.val();

    var isEmptyUsername = username.length <= 0;
    var isEmptyPassword = password.length <= 0;

    if ( isEmptyUsername || isEmptyPassword ) return;

    $.ajax({

      url: 'ajax-request-handler.php',
      type: 'POST',
      dataType: 'JSON',

      'data' : {
        'requestType' : 'authenticateUser',
        'username' : username,
        'password' : password
      },

      beforeSend: function() {
        hideErrorMessage();
        lockUI();
      },

      'complete' : function() {
        unlockUI();
      },

      'success' : function( data ) {

        var loginSuccess = data.success == 'true';

        if ( loginSuccess ) window.location.replace('users-panel.php');
        else showErrorMessage( data.errorDescription );

      },

      error: function() {
        showErrorMessage( 'No se ha podido completar la comunicación con el servidor.' );
      }

    });

  };

  /* -- Event listeners -- */

  Dom.$formLogin.on( 'submit', function() {
    loginRequest();
    return false;
  });

});
