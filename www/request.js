
    const beginUrl = 'http://'+window.location.host+'/univ_back/php_server/';

    async function getData(){
        let data = await fetch(beginUrl +'mainController/get_all_users',{
            method: 'GET',
            headers: {
                'Authorization': 'test_123_authorization',
            }
        });
        let res = await data.json();
        console.log(res);
    }

    async function insert_into_database(username,email,pass,usertype){
        let data = await fetch(
            beginUrl +'mainController/add_user/'+username+'/'+email+'/'+pass+'/'+usertype,{
            method: 'POST',
            headers: {
                'Authorization': 'test_123_authorization',
            }
        });
        let res = await data.json();
        console.log(res);
    }
    async function sendMail(email,message){
        let data = await fetch(
            beginUrl +'mainController/send_mail/'+email+'/'+message,{
            method: 'POST',
            headers: {
                'Authorization': 'test_123_authorization',
            }
        });
        let res = await data.text();
        console.log(res);
        // return 'mail function called';
    }



    sendMail('filipp-tts@outlook.com','some message from JS request');
    // getData();
    // get_second_Data();
    // insertUser('Daaaan','Daaaan@email.com','qwe22rty','client');




