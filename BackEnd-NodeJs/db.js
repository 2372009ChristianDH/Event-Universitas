require('dotenv').config();
const mysql = require('mysql');

const db = mysql.createConnection({
  host: process.env.DB_HOST,       // contoh: '127.0.0.1'
  user: process.env.DB_USER,       // contoh: 'root'
  password: process.env.DB_PASS,   // contoh: ''
  database: process.env.DB_NAME    // contoh: 'eventdb'
});

db.connect(err => {
  if (err) {
    console.error('DB connection failed:', err.message);
    process.exit(1);
  }
  console.log('Connected to MySQL database');
});

module.exports = db;
