const API_BASE_URL = "http://localhost:3001";

async function fetchAPI(endpoint, method = "GET", data = null) {
  const url = `${API_BASE_URL}/${endpoint}`;
  const options = {
    method,
    headers: {
      "Content-Type": "application/json",
    },
    body: data ? JSON.stringify(data) : null,
  };

  try {
    const response = await fetch(url, options);
    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
    return await response.json();
  } catch (error) {
    console.error("Fetch error:", error);
    throw error;
  }
}

function displayResults(results) {
  const resultsSection = document.getElementById("results");
  resultsSection.innerHTML = `<pre>${JSON.stringify(results, null, 2)}</pre>`;
  resultsSection.classList.add("fade-in");
  setTimeout(() => resultsSection.classList.remove("fade-in"), 500);
}

function displayBlocks(blocks) {
  const blocksList = document.getElementById("blocks-list");
  blocksList.innerHTML = "";
  blocks.forEach((block, index) => {
    const li = document.createElement("li");
    li.className = "block";
    li.textContent = `Block ${index}: ${block.hash.substring(0, 10)}...`;
    li.style.opacity = "0";
    li.style.transform = "translateY(20px)";
    blocksList.appendChild(li);
    setTimeout(() => {
      li.style.opacity = "1";
      li.style.transform = "translateY(0)";
    }, index * 100);
  });
}

async function getBlocks() {
  try {
    const blocks = await fetchAPI("blocks");
    displayBlocks(blocks);
    displayResults("Blockchain récupérée avec succès");
    animateAction("get-blocks");
  } catch (error) {
    console.error("Error fetching blocks:", error);
    displayResults("Erreur lors de la récupération de la blockchain");
  }
}

async function mineBlock() {
  try {
    const newBlock = await fetchAPI("mineBlock", "POST");
    displayResults("Nouveau bloc miné avec succès");
    getBlocks();
    animateAction("mine-block");
  } catch (error) {
    console.error("Error mining block:", error);
    displayResults("Erreur lors du minage du bloc");
  }
}

async function sendTransaction() {
  try {
    const transaction = {
      address: "04bfcab8722991ae774db48f934ca79cfb7dd991229153b9f732ba5334aafcd8e7266e47076996b55a14bf9913ee3145ce0cfc1372ada8ada74bd287450313534b",
      amount: 35,
    };
    const result = await fetchAPI("sendTransaction", "POST", transaction);
    displayResults(result);
    animateAction("send-transaction");
  } catch (error) {
    console.error("Error sending transaction:", error);
    displayResults({ error: "Failed to send transaction" });
  }
}

function animateAction(action) {
  const actionElement = document.createElement("div");
  actionElement.className = `action-animation ${action}`;
  document.body.appendChild(actionElement);
  setTimeout(() => actionElement.remove(), 1000);
}

document.addEventListener("DOMContentLoaded", () => {
  const actionsSection = document.getElementById("actions");

  const actions = [
    { name: "Obtenir la blockchain", func: getBlocks },
    { name: "Miner un bloc", func: mineBlock },
    { name: "Envoyer une transaction", func: sendTransaction },
  ];

  actions.forEach((action) => {
    const button = document.createElement("button");
    button.textContent = action.name;
    button.addEventListener("click", action.func);
    actionsSection.appendChild(button);
  });
});
