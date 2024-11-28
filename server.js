const express = require('express');
const helmet = require('helmet');
const cors = require('cors');

app.use(helmet());
app.use(cors());

// Configurez CSP pour autoriser les ressources nécessaires
app.use(helmet.contentSecurityPolicy({
  directives: {
    defaultSrc: ["'self'"],
    scriptSrc: ["'self'", "'unsafe-inline'"],
    styleSrc: ["'self'", "'unsafe-inline'"],
    imgSrc: ["'self'", "data:", "http:", "https:"],
  },
}));

const app = express();
const port = 3001;

app.use(cors());
app.use(bodyParser.json());

// Exemple de données blockchain
let blockchain = [{ index: 0, data: "Genesis Block", hash: "0" }];

// Route pour obtenir les blocs
app.get("/blocks", (req, res) => {
  res.json(blockchain);
});

// Route pour miner un bloc
app.post("/mineBlock", (req, res) => {
  const newBlock = {
    index: blockchain.length,
    data: req.body.data || `Block #${blockchain.length}`,
    hash: `hash${blockchain.length}`,
  };
  blockchain.push(newBlock);
  res.json(newBlock);
});

// Route pour envoyer une transaction
app.post("/sendTransaction", (req, res) => {
  const { address, amount } = req.body;
  const transaction = { address, amount };
  res.json({ message: "Transaction added", transaction });
});

app.listen(port, () => {
  console.log(`Serveur Naivecoin démarré sur http://localhost:${port}`);
});
