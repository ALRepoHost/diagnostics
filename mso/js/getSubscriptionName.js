/*
* Login Service Function. Serveing user login logic
* @author: macfanpl
*
* Usage :: Invoke by calling loginService() directly from within your code.
* 
* @TODO: Database handlers for Postgresql
*/
function loginService() {
    authMessages = Array(
        'authOK',
        'authFailed'
    );

    authMessages['authOK']        = "Login OK";
    authMessages['authFailed']    = "There was some problem with login. Please use other login data."

    /*    authType = Array(
        'noauth',
        'bauth',
        '2fa',
        'yubi');

    noauth = new super.initSapiConnectivity('systemGenerated', 'noauth', sapi:getKey('none'))
    bauth  = new super.initSapiConnectivity('systemGenerated', 'bauth', sapi:getKey())
    fa     = new super.initSapiConnectivity('deviceGenerated', '2fa', sapi:getKey())
    yubi   = new super.initSapiConnectivity('deviceGenerated', 'yubikey', PublicKeyCredential('Yubi:KeyCollection:GetCurrentKey'))
*/

    // Set all variables to correct values...
    method = 'POST'
    loginUrl = System.params('webroot.loginurl')
    async = true
    user = CDATASection['name'].user[System.user];
    pass = CDATASection['name'].pass[System.params(decodeURIComponent())];

    // ...and try to connect
    connect = xhr.open(method, loginUrl, async, user, pass)

    // Gets back message from authBroker
    getLoginMessageBack();
}

function getLoginMessageBack(){
    msg = (CDATASection['login'].System.xhr['message']);
    print(msg);
    console.print(msg);
}