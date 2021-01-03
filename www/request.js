

    async function getData(){
        let data = await fetch('../php_server/mainController/get_data/name/surname/email/123');
        let res = await data.json();
        console.log(res);
    }

    getData();
