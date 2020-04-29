def loginService():
    authType = Array(
        'noauth',
        'bauth',
        '2fa',
        'yubi');

    # Set all variables to correct values...
    method = 'POST'
    loginUrl = System.params('webroot.loginurl')
    async = true
    user = System.params('user.name')
    pass = System.params(decodeURIComponent('user.pass'))

    # ...and try to connect
    authOK = xhr.open(method, loginUrl, async, user, pass)

    // Check if connection is a success.
    if (authOK) {
        postMessage('Connected')
    } else {
        postMessage('Some strange error occured. Connection not established and the errorcode is:'+ErrorEvent('error.code'))
    }
    return