var mysql = require('mysql2');

function select(id_conteudo, id_usuario){
  var con = mysql.createConnection({
    host: "92.249.44.207",
    user: "u871029417_athon",
    password: "Vitor@123",
    database: "u871029417_athon"
  });
  
  con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM conteudoaluno WHERE id_conteudo = "+id_conteudo+" AND id_usuario = "+id_usuario+"", function (err, result, fields) {
      if (err) throw err;
      console.log(result);
    });
  });
}

select(95,5);

module.exports = {select};
