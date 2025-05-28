const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const db = require('../db');

exports.login = (req, res) => {
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
      return res.status(401).json({ message: 'Email tidak ditemukan' });
    }

    const user = results[0];
    const isMatch = await bcrypt.compare(password, user.password);

    if (!isMatch) {
      return res.status(401).json({ message: 'Password salah' });
    }

    const token = jwt.sign(
      { id: user.id_user, role: user.id_role },
      'secretkey', // ganti dengan env variable di produksi
      { expiresIn: '1d' }
    );

    return res.json({
      token,
      role: user.id_role,
      nama_role: user.nama_role,
      email: user.email,
      nama: user.nama,
    });
  });
};

exports.register = async (req, res) => {
  const { nama, email, password } = req.body;

  const checkEmailSql = 'SELECT id_user FROM user WHERE email = ?';
  db.query(checkEmailSql, [email], async (err, results) => {
    if (err) return res.status(500).json({ message: 'Server error' });

    if (results.length > 0) {
      return res.status(409).json({ message: 'Email sudah terdaftar' });
    }

    const hashedPassword = await bcrypt.hash(password, 10);

    const insertSql = `
      INSERT INTO user (nama, email, password, id_role)
      VALUES (?, ?, ?, 4)
    `;

    db.query(insertSql, [nama, email, hashedPassword], (err) => {
      if (err) return res.status(500).json({ message: 'Gagal mendaftar' });

      return res.status(201).json({ message: 'Registrasi berhasil! Silahkan login.' });
    });
  });
};
