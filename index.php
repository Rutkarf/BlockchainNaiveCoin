<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface R4V3 BlockChain</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
</head>

<body>
    <div id="particles-js"></div>
    <header>
        <h1 class="glitch" data-text="Interface Blockchain Naivecoin">Interface R4V3 BlockChain</h1>
    </header>
    <main>
        <div id="blockchain-container">
            <h2 class="neon">Blockchain</h2>
            <ul id="blocks-list"></ul>
        </div>
        <section id="actions"> <button class="cybr-btn" onclick="getBlocks()"> Obtenir Blockchain<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Obtenir_Blockchain</span> <span aria-hidden class="cybr-btn__tag">R25</span> </button> <button class="cybr-btn" onclick="mineBlock()"> Miner Bloc<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Miner_Bloc</span> <span aria-hidden class="cybr-btn__tag">R26</span> </button> <button class="cybr-btn" onclick="showTransactionForm()"> Nouvelle Transaction<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Nouvelle_Transaction</span> <span aria-hidden class="cybr-btn__tag">R27</span> </button> <button class="cybr-btn" onclick="getBalance()"> Solde<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Solde_</span> <span aria-hidden class="cybr-btn__tag">R28</span> </button> <button class="cybr-btn" onclick="getPeers()"> Pairs<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Pairs_</span> <span aria-hidden class="cybr-btn__tag">R29</span> </button> </section>
        <div id="transaction-form" class="hidden">
            <h2 class="neon">Nouvelle Transaction</h2> <input type="text" id="recipient-address" placeholder="Adresse du destinataire"> <input type="number" id="amount" placeholder="Montant"> <button class="cybr-btn" onclick="sendTransaction()"> Envoyer<span aria-hidden>_</span> <span aria-hidden class="cybr-btn__glitch">Envoyer_</span> <span aria-hidden class="cybr-btn__tag">R30</span> </button>
        </div>
        <div id="results">
            <h2 class="neon">Résultats</h2>
            <pre id="result-content"></pre>
        </div>
    </main>
    <script src="app.js"></script>
    <script>
        particlesJS.load('particles-js', 'particles.json', function() {
            console.log('particles.js loaded');
        });
    </script>
</body>

</html>