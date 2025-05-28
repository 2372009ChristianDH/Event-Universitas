const express = require('express');
const cors = require('cors');
const authRoutes = require('./routes/route');

const app = express();

app.use(cors());
app.use(express.json());

// Route prefix
app.use('/api/auth', authRoutes);

app.listen(5000, () => console.log('Server running on port 5000'));
