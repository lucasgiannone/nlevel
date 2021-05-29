async function connect(){
    if(global.connection && global.connection.state !== 'disconnected')
        return global.connection;
 
    const mysql = require("mysql");
    const connection = await mysql.createConnection("mysql://u871029417_athon:Vitor@123@92.249.44.207:3306/u871029417_athon");
    console.log("Conectou no MySQL!");
    global.connection = connection;
    return connection;
}

async function updateCustomer(id, customer){
    const conn = await connect();
    const sql = 'UPDATE conteudoaluno SET watchtime=? WHERE id=?';
    const values = [customer.watchtime, id];
    return await conn.query(sql, values);
}
 
module.exports = {selectCustomers}