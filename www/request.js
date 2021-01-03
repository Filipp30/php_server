

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

    getData();
