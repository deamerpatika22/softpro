'use strict';
const functions = require('firebase-functions');
const mysql = require('mysql');
const { WebhookClient } = require('dialogflow-fulfillment');
const { Card, Suggestion } = require('dialogflow-fulfillment');

process.env.DEBUG = 'dialogflow:debug'; // enables lib debugging statements

// URL untuk card
const mysiteurl = 'https://en.wikipedia.org/wiki/Narendra_Modi';

exports.dialogflowFirebaseFulfillment = functions.https.onRequest((request, response) => {
  const agent = new WebhookClient({ request, response });
  const action = request.body.queryResult.action;

  // Fungsi welcome
  function welcome(agent) {
    agent.add(`Welcome to infohub personal assistant, my name is Isobel`);
    agent.add(new Card({
      title: `mysite`,
      imageUrl: mysiteurl,
      text: `Did you know about my site? If not, visit it now!`,
      buttonText: 'mysite',
      buttonUrl: mysiteurl
    }));
    agent.add(`I can help you get information already contained in my site.`);
    agent.add(new Suggestion(`population`));
    agent.add(new Suggestion(`avgincome`));
    agent.add(new Suggestion(`thisyeargdp`));
  }

  // Fungsi untuk navigasi distance dan interaksi dengan DB
  function navigationdistance(agent) {
    const from = agent.parameters.from;
    const to = agent.parameters.to;

    if (!from || !to) {
      agent.add("Please provide both 'from' and 'to' locations.");
      return;
    }

    // Cek action dari Dialogflow untuk memastikan query yang benar
    if (action === 'get.data') {
      callDB(from, to).then((output) => {
        response.setHeader('Content-Type', 'application/json');
        response.send(JSON.stringify(output));
      }).catch((error) => {
        response.setHeader('Content-Type', 'application/json');
        response.send(JSON.stringify(error));
      });
    }

    agent.setContext({
      name: 'navigationdistance',
      lifespan: 3,
      parameters: { from: from, to: to }
    });

    agent.add(`You asked for information about ${to} in ${from}`);
    agent.add(`Would you like to know something else?`);
    agent.add(new Suggestion(`population`));
    agent.add(new Suggestion(`avgincome`));
    agent.add(new Suggestion(`thisyeargdp`));
  }

  // Fungsi fallback jika input tidak dikenali
  function fallback(agent) {
    agent.add(`I didn't get that, can you try again?`);
  }

  // Fungsi untuk memanggil database
  function callDB(from, to) {
    return new Promise((resolve, reject) => {
      try {
        const connection = mysql.createConnection({
          host: "localhost",
          user: "root",
          password: "",
          database: "test"
        });

        // Query SQL dengan parameterized query untuk menghindari SQL Injection
        const sql = "INSERT INTO mocktable (`from`, `to`) VALUES (?, ?)";
        connection.query(sql, [from, to], function (error, results, fields) {
          if (!error) {
            let response = "The solution is: " + results.insertId; // Menggunakan insertId jika ada
            response = response.toString();
            let output = { 'speech': response, 'displayText': response };
            console.log(output);
            resolve(output);
          } else {
            let output = {
              'speech': 'Error. Query Failed.',
              'displayText': 'Error. Query Failed.'
            };
            console.log(output);
            reject(output);
          }
        });
        connection.end();
      } catch (err) {
        let output = {
          'speech': 'Error in try-catch block.',
          'displayText': 'Error in try-catch block.'
        };
        console.log(output);
        reject(output);
      }
    });
  }

  let intentMap = new Map();
  intentMap.set('Default Welcome Intent', welcome);
  intentMap.set('get info about mycountry', navigationdistance);
  intentMap.set('Default Fallback Intent', fallback);
  agent.handleRequest(intentMap);
});
