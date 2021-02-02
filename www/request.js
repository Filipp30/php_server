
    const beginUrl = 'http://'+window.location.host+'/universal_backend/php_server/';

    async function getData(){
        let jwt = localStorage.getItem("jwt_user");
        let data = await fetch(beginUrl +'mainController/get_all_users/',{
            method: 'GET',
            headers: {
                'Authorization': jwt,
            }
        });
        let res = await data.json();
        console.log(res);
    }

    async function sendMail(email,message){
        let jwt = localStorage.getItem("jwt_user");
        const body = {
            email: email,
            message: message,
        };
        let data = await fetch(
            beginUrl +'mainController/send_mail/',{
                method: 'POST',
                headers: {
                    'Authorization': jwt,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            });
        let res = await data.json();
        console.log(res);
    }

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



    //comment van Korneel :Bij de signIn_getJwt functie
    // zou ik de username en password in een Basic authentication header steken

    async function signIn_getJwt(username,pass){
        let data = await fetch(beginUrl +'identityController/user_authentication/',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username:username,
                password:pass,
            }),
        });
        let res = await data.json().then(
            function(data){
                saveJwt(data);
                console.log('jwt-token:'+data);
            }
        )
    }

    //jwt storage:development mode , need to remove this function and take other storage
    function saveJwt(res){
        localStorage.setItem("jwt_user",res);
    }


    // signIn_getJwt('mitja','123');

    // sendMail('filipp-tts@outlook.com','Some text message for send witch mail');
    getData();
    // add_new_user_into_database(
    //     'mitja','mitja@some_qwer.com','123','mmm_name','mmm_name').then(
    //     ()=>{ console.log('function add_new_user_into_database FINISHED');}
    // );




