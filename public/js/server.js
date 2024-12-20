const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
app.use(bodyParser.json());

// Konfigurasi MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: ' ',
    database: 'softproject'
});

db.connect(err => {
    if (err) throw err;
    console.log('Connected to MySQL!');
});

// Endpoint untuk webhook Dialogflow
app.post('/webhook', (req, res) => {
    const intent = req.body.queryResult.intent.displayName;

    if (intent === 'GetUserInfo') {
        const name = req.body.queryResult.parameters.name;

        db.query('SELECT * FROM users WHERE name = ?', [name], (err, result) => {
            if (err) {
                console.error(err);
                return res.send({
                    fulfillmentText: 'Maaf, ada kesalahan pada server.'
                });
            }

            if (result.length > 0) {
                const user = result[0];
                res.send({
                    fulfillmentText: Nama: ${user.name}, Email: ${user.email}
                });
            } else {
                res.send({
                    fulfillmentText: 'Data tidak ditemukan.'
                });
            }
        });
    } else {
        res.send({
            fulfillmentText: 'Intent tidak dikenali.'
        });
    }
});

// Menjalankan server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(Server berjalan di port ${PORT});
});