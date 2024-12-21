// const express = require('express');

const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

app.use(bodyParser.json());

// Konfigurasi koneksi MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'softproject'
});

// Menyambungkan ke MySQL
db.connect((err) => {
  if (err) {
    console.error('Error connecting to database: ', err);
    return;
  }
  console.log('Connected to MySQL');
});

// Webhook endpoint untuk menerima permintaan dari Dialogflow
app.post('/webhook', (req, res) => {
  const sessionId = req.body.session; // Mendapatkan session_id dari request Dialogflow
  const userMessage = req.body.queryResult.queryText; // Mendapatkan pesan pengguna
  const botResponse = req.body.queryResult.fulfillmentText; // Mendapatkan respon bot

  // Query untuk menyimpan history percakapan ke database
  const query = 'INSERT INTO conversations (session_id, user_message, bot_response) VALUES (?, ?, ?)';
  const values = [sessionId, userMessage, botResponse];

  db.query(query, values, (err, result) => {
    if (err) {
      console.error('Error inserting into database: ', err);
      res.status(500).send('Internal Server Error');
      return;
    }
    console.log('Data saved to MySQL');
    res.status(200).send({ fulfillmentText: botResponse }); // Kirim kembali response ke Dialogflow
  });
});

// Menjalankan server
app.listen(port, () => {
  console.log(`Webhook server running at http://localhost:${port}`);
});
