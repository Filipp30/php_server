async function getData(){
let data = await fetch('../php_server/mainController/select_All/');
let res = await data.json();
console.log(res);
}

getData();
