const express = require('express');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 9080;

app.use(express.static(path.join(__dirname, './')));

// app.get('/app-ads.txt', (req, res) => {
//   res.sendFile(path.join(__dirname, './', 'app-ads.txt'));
// });

app.get('*', (req, res) => {
  res.sendFile(path.join(__dirname, './', 'index.html'));
});

app.listen(PORT);

console.log('app running on ', PORT);