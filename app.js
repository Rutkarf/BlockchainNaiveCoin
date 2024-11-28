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
}

async function getBlocks() {
  try {
    const blocks = await fetchAPI("blocks");
    displayResults(blocks);
  } catch (error) {
    console.error("Error fetching blocks:", error);
    displayResults({ error: "Failed to fetch blocks" });
  }
}

async function mineBlock() {
  try {
    const newBlock = await fetchAPI("mineBlock", "POST");
    displayResults(newBlock);
  } catch (error) {
    console.error("Error mining block:", error);
    displayResults({ error: "Failed to mine block" });
  }
}

async function sendTransaction() {
  try {
    const transaction = {
      address:
        "04bfcab8722991ae774db48f934ca79cfb7dd991229153b9f732ba5334aafcd8e7266e47076996b55a14bf9913ee3145ce0cfc1372ada8ada74bd287450313534b",
      amount: 35,
    };
    const result = await fetchAPI("sendTransaction", "POST", transaction);
    displayResults(result);
  } catch (error) {
    console.error("Error sending transaction:", error);
    displayResults({ error: "Failed to send transaction" });
  }
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
