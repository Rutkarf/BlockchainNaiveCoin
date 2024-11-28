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
        <h1 class="glitch" data-text="Interface R4V3 BlockChain">Interface R4V3 BlockChain</h1>
    </header>
    <main>
        <section id="actions" class="section"> <button class="cybr-btn" onclick="getBlocks()">Obtenir Blockchain<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Obtenir_Blockchain</span><span aria-hidden class="cybr-btn__tag">R25</span></button> <button class="cybr-btn" onclick="mineBlock()">Miner Bloc<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Miner_Bloc</span><span aria-hidden class="cybr-btn__tag">R26</span></button> <button class="cybr-btn" onclick="showTransactionForm()">Nouvelle Transaction<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Nouvelle_Transaction</span><span aria-hidden class="cybr-btn__tag">R27</span></button> <button class="cybr-btn" onclick="getBalance()">Solde<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Solde_</span><span aria-hidden class="cybr-btn__tag">R28</span></button> <button class="cybr-btn" onclick="getPeers()">Pairs<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Pairs_</span><span aria-hidden class="cybr-btn__tag">R29</span></button> <button class="cybr-btn" onclick="showBlockExplorer()">Explorateur de Blocs<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Explorateur_Blocs</span><span aria-hidden class="cybr-btn__tag">R31</span></button> <button class="cybr-btn" onclick="showNetworkStats()">Statistiques Réseau<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Stats_Réseau</span><span aria-hidden class="cybr-btn__tag">R32</span></button> <button class="cybr-btn" onclick="showWalletConnect()">Connecter Wallet<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Connecter_Wallet</span><span aria-hidden class="cybr-btn__tag">R34</span></button> <button class="cybr-btn" onclick="showSmartContractInteraction()">Smart Contracts<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Smart_Contracts</span><span aria-hidden class="cybr-btn__tag">R35</span></button> <button class="cybr-btn" onclick="showStakingOptions()">Staking<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Staking_Options</span><span aria-hidden class="cybr-btn__tag">R36</span></button> <button class="cybr-btn" onclick="showGovernanceVoting()">Gouvernance<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Gouvernance_Voting</span><span aria-hidden class="cybr-btn__tag">R37</span></button> </section>
        <div id="blockchain-container" class="section">
            <h2 class="neon">Blockchain</h2>
            <ul id="blocks-list"></ul>
        </div>
        <div id="transaction-form" class="section">
            <h2 class="neon">Nouvelle Transaction</h2> <input type="text" id="recipient-address" placeholder="Adresse du destinataire"> <input type="number" id="amount" placeholder="Montant"> <button class="cybr-btn" onclick="sendTransaction()">Envoyer<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Envoyer_</span><span aria-hidden class="cybr-btn__tag">R30</span></button>
        </div>
        <div id="block-explorer" class="section">
            <h2 class="neon">Explorateur de Blocs</h2> <input type="text" id="block-hash" placeholder="Hash du bloc"> <button class="cybr-btn" onclick="searchBlock()">Rechercher<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Rechercher_</span><span aria-hidden class="cybr-btn__tag">R33</span></button>
            <div id="block-details"></div>
        </div>
        <div id="network-stats" class="section">
            <h2 class="neon">Statistiques Réseau</h2>
            <div id="stats-content"></div>
        </div>
        <div id="wallet-connect" class="section">
            <h2 class="neon">Connecter Wallet</h2>
            <div id="wallet-options"></div>
        </div>
        <div id="smart-contract-interaction" class="section">
            <h2 class="neon">Interaction Smart Contracts</h2> <textarea id="contract-abi" placeholder="ABI du contrat"></textarea> <input type="text" id="contract-address" placeholder="Adresse du contrat"> <button class="cybr-btn" onclick="interactWithContract()">Interagir<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Interagir_</span><span aria-hidden class="cybr-btn__tag">R38</span></button>
        </div>
        <div id="staking-options" class="section">
            <h2 class="neon">Options de Staking</h2> <input type="number" id="stake-amount" placeholder="Montant à staker"> <button class="cybr-btn" onclick="stakeTokens()">Staker<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Staker_</span><span aria-hidden class="cybr-btn__tag">R39</span></button>
        </div>
        <div id="governance-voting" class="section">
            <h2 class="neon">Vote de Gouvernance</h2> <select id="proposal-select">
                <option value="">Sélectionner une proposition</option>
            </select> <button class="cybr-btn" onclick="castVote()">Voter<span aria-hidden>_</span><span aria-hidden class="cybr-btn__glitch">Voter_</span><span aria-hidden class="cybr-btn__tag">R40</span></button>
        </div>
        <div id="results" class="section">
            <h2 class="neon">Résultats</h2>
            <pre id="result-content"></pre>
        </div>
    </main>
    <footer>
        <p class="neon">&copy; 2024 R4V3 BlockChain | Propulsé par #Fraktur</p>
    </footer>
    <script src="app.js"></script>
    <script>
        particlesJS.load('particles-js', 'particles.json', function() {
            console.log('particles.js loaded');
        });
    </script>
</body>

</html>