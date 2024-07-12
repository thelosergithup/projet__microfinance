// script.js
document.addEventListener('DOMContentLoaded', () => {
    fetchLoans();
});

async function fetchLoans() {
    const response = await fetch('get_loans.php');
    const loans = await response.json();

    const loanList = document.getElementById('loanList');
    loanList.innerHTML = '';

    loans.forEach(loan => {
        const loanCard = document.createElement('div');
        loanCard.classList.add('loan-card');

        loanCard.innerHTML = `
            <h2>${loan.type}</h2>
            <button class="btn-accept" onclick="acceptLoan(${loan.id})">Accepter</button>
            <button class="btn-delete" onclick="deleteLoan(${loan.id})">Supprimer</button>
        `;

        loanList.appendChild(loanCard);
    });
}

function acceptLoan(loanId) {
    // Logique pour accepter le prêt
    alert(`Prêt ${loanId} accepté.`);
}

function deleteLoan(loanId) {
    // Logique pour supprimer le prêt
    alert(`Prêt ${loanId} supprimé.`);
}