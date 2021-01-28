
    const beginUrl = 'http://'+window.location.host+'/universal_backend/php_server/';

    // async function getData(){
    //     let data = await fetch(beginUrl +'mainController/get_all_users/',{
    //         method: 'GET',
    //         headers: {
    //             'Authorization': 'Bearer test_123_authorization',
    //         }
    //     });
    //     let res = await data.json();
    //     console.log(res);
    // }

    // async function sendMail(email,message){
    //     const body = {
    //         email: email,
    //         message: message,
    //     };
    //     let data = await fetch(
    //         beginUrl +'mainController/send_mail/',{
    //             method: 'POST',
    //             headers: {
    //                 'Authorization': 'Bearer test_123_authorization',
    //                 'Content-Type': 'application/json'
    //             },
    //             body: JSON.stringify(body)
    //         });
    //     let res = await data.json();
    //     console.log(res);
    // }

    async function add_new_user_into_database(username,email,pass,first_name,last_name){
        let data = await fetch(
            beginUrl +'identityController/user_registration/',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username:username,
                email:email,
                password:pass,
                first_name:first_name,
                last_name:last_name,
            }),
        });
        let res = await data.json();
        console.log(res);
    }

    async function signIn_getJwt(username,pass){
        let data = await fetch(beginUrl +'identityController/user_authentication/'+username+'/'+pass,{
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        let res = await data.json();
        console.log(res);
    }


    // signIn_getJwt('qwer_name','456');

    // sendMail('filipp-tts@outlook.com','Some text message for send witch mail');
    // getData();
    // add_new_user_into_database(
    //     'qwer_name','qwer@some_qwer.com','456','qwer_name','qwer_name').then(
    //     ()=>{ console.log('function add_new_user_into_database FINISHED');}
    // );




