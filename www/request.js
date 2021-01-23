
    const beginUrl = 'http://'+window.location.host+'/universal_backend/php_server/';

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
        const body = {
            email: email,
            message: message,

        };
        let data = await fetch(
            beginUrl +'mainController/send_mail/',{
            method: 'POST',
            headers: {
                'Authorization': 'test_123_authorization',
                'Content-Type': 'application/json'
            },
                body: JSON.stringify(body)
        });
        let res = await data.json();
        console.log(res);
    }


    // sendMail('filipp-tts@outlook.com','Some text message for send witch mail');
    getData();
    // get_second_Data();
    // insertUser('Daaaan','Daaaan@email.com','qwe22rty','client');




