
    const beginUrl = 'http://'+window.location.host+'/univ_back/php_server/';

    async function getData(){
        let data = await fetch(beginUrl +'mainController/get_all_users',{
            method: 'GET',
            headers: {
                'Authorization': 'some123',
            }
        });
        let res = await data.json();
        console.log(res);
    }
    async function get_second_Data(){
        let data = await fetch(beginUrl +'mainController/get_all_users',{
            method: 'GET',
            headers: {
                'Authorization': 'second321',
            }
        });
        let res = await data.json();
        console.log(res);

    }
    getData();
    get_second_Data();
    async function insertUser(username,email,pass,usertype){
        let data = await fetch(
            beginUrl +'mainController/add_user/'+username+'/'+email+'/'+pass+'/'+usertype,{
            method: 'POST',
            headers: {
                'Authorization': 'second444',
            }
        });
        let res = await data.json();
        console.log(res);
    }
    // insertUser('Daaaan','Daaaan@email.com','qwe22rty','client');




