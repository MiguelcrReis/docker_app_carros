const express = require('express')
const mysql = require('mysql')

const app = express()

const connection = mysql.createConnection({
  host: 'mysql-container',
  user: 'root',
  password: 'admin',
  database: 'concessionaria'
})

connection.connect()

app.get('/carros', function (req, res) {
  connection.query('SELECT * FROM carros', function (error, results) {
    if (error) {
      throw error
    }
    res.send(
      results.map(item => ({
        placa: item.placa,
        marca: item.marca,
        modelo: item.modelo,
        ano: item.ano,
        preco: item.preco
      }))
    )
  })
})

app.listen(9001, '0.0.0.0', function () {
  console.log('Listening on port 9001')
})
