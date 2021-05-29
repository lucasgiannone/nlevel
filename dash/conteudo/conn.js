let mysql = require('mysql');
let connection = mysql.createConnection({
    host: '92.249.44.207',
    user: 'u871029417_athon',
    password: 'Vitor@123',
    database: 'u871029417_athon',
    });
    
connection.connect(function(err) {
    if (err){ 
        return console.error('error:' +err.message);
    }
    console.log('Connected');
});

function conn(){
    
}