

    async function getData(){
        let data = await fetch('http://localhost:81/univ_back/php_server/mainController/get_all_users',{
            method: 'GET',
            headers: {
                'Authorization': 'some123',
            }
        });
        let res = await data.json();
        console.log(res);
    }
    async function insertUser(username,email,pass,usertype){
        let data = await fetch(
            'http://localhost:81/univ_back/php_server/mainController/add_user/'+username+'/'+email+'/'+pass+'/'+usertype,{
            method: 'POST',
            headers: {
                'Authorization': 'some123',
            }
        });
        let res = await data.json();
        console.log(res);
    }
    // insertUser('someName','email@email.com','12345','client');
    getData();

