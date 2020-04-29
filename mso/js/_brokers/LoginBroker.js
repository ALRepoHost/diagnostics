function loginBroker() {
    msg = getLoginMessageBack();

    switch (msg) {
        case 'Login OK':
            loginSuccess();
            break;
    
        default:
            break;
    }
}

function loginSuccess(){
    red = "http://api.pop8.dev";
    $.ajax({
        type: "POST",
        beforeSend: function(request){
            request.setRequestHeaders("header", red);
        },
    url: red,
    data: "json=" + escape(JSON.stringify(createRequestObject)),
    processData: false,
    success: function(red){
        // Tutaj kod akcji w przypadku prawidłowego logowania
        console.log(msg);
    }
    })
}