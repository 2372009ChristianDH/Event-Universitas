const express = require('express');
const cors = require('cors');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');

const db = require('./db'); // koneksi database mysql

const app = express();
app.use(cors());
app.use(express.json());


// Login
app.post('/api/auth/login', (req, res) => {
  const { email, password } = req.body;

  const sql = `
    SELECT u.id_user, u.nama, u.email, u.password, u.id_role, r.nama_role
    FROM user u
    JOIN Role r ON u.id_role = r.id_role
    WHERE u.email = ?
  `;

  db.query(sql, [email], async (err, results) => {
    if (err) return res.status(500).json({ message: 'Server error' });

    if (results.length === 0) {
      // Email tidak ditemukan
      return res.status(401).json({ message: 'Email tidak ditemukan' });
    }

    const user = results[0];
    const isMatch = await bcrypt.compare(password, user.password);

    if (!isMatch) {
      // Password salah
      return res.status(401).json({ message: 'Password salah' });
    }

    const token = jwt.sign({ id: user.id_user, role: user.id_role }, 'secretkey');

    return res.json({ 
      token,
      role: user.id_role,
      nama_role: user.nama_role,
      nama: user.nama
    });
  });
});

app.listen(5000, () => console.log('Server running on port 5000'));
