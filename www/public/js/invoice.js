// Pobierz referencję do przycisku "Dodaj kolejny"
const addButton = document.querySelector('.add');

// Dodaj nasłuchiwanie na kliknięcie przycisku "Dodaj kolejny"
addButton.addEventListener('click', addRow);

// Funkcja obsługująca dodanie nowego wiersza
function addRow() {
    // Pobierz referencję do tabeli z produktem/usługą
    const inventoryTable = document.querySelector('.inventory tbody');

    // Utwórz nowy wiersz
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
    <td><a class="cut">Usuń</a><input type="text" name="item[productName][]" placeholder="Konsultacja"></td>
    <td><input type="text" name="item[unitNetPrice][]" placeholder="100.00"><span data-prefix> PLN</span></td>
    <td><input type="number" name="item[vat][]" step="0.1" placeholder="23"><span> %</span></td>
    <td><span class="unitGrossPrice"></span><span data-prefix> PLN</span></td>
    <td><input type="number" name="item[quantity][]" step="0.1" placeholder="2"></td>
    <td><span class="rowNetPrice"></span><span data-prefix> PLN</span></td>
    <td><span class="rowGrossPrice"></span><span data-prefix> PLN</span></td>
  `;

    // Dodaj nowy wiersz do tabeli
    inventoryTable.appendChild(newRow);

    // Pobierz referencje do nowych pól w dodanym wierszu
    const unitNetPriceInput = newRow.querySelector('input[name="item[unitNetPrice][]"]');
    const vatInput = newRow.querySelector('input[name="item[vat][]"]');
    const unitGrossPriceSpan = newRow.querySelector('.unitGrossPrice');
    const rowNetPriceSpan = newRow.querySelector('.rowNetPrice');
    const rowGrossPriceSpan = newRow.querySelector('.rowGrossPrice');
    const quantityInput = newRow.querySelector('input[name="item[quantity][]"]');

    // Dodaj nasłuchiwanie na zmianę wartości w nowych polach
    unitNetPriceInput.addEventListener('input', updateRowPrices);
    vatInput.addEventListener('input', updateRowPrices);
    quantityInput.addEventListener('input', updateRowPrices);

    // Aktualizuj wartości dla nowo dodanego wiersza
    updateRowPrices.call(unitNetPriceInput);

    // Aktualizuj wartości dla wszystkich wierszy
    updateAllRows();
}

// Dodaj nasłuchiwanie na kliknięcie przycisku "Usuń"
const inventoryTableCut = document.querySelector('.inventory tbody');
inventoryTableCut.addEventListener('click', (event) => {
    if (event.target.classList.contains('cut')) {
        const row = event.target.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateBalance(); // Aktualizuj wartości w tabeli balance po usunięciu wiersza
    }
});


// Funkcja aktualizująca wartość brutto dla danego wiersza
function updateRowPrices() {
    // Pobierz referencje do pól w danym wierszu
    const row = this.parentNode.parentNode;
    const unitNetPriceInput = row.querySelector('input[name="item[unitNetPrice][]"]');
    const vatInput = row.querySelector('input[name="item[vat][]"]');
    const unitGrossPriceSpan = row.querySelector('.unitGrossPrice');
    const rowNetPriceSpan = row.querySelector('.rowNetPrice');
    const rowGrossPriceSpan = row.querySelector('.rowGrossPrice');
    const quantityInput = row.querySelector('input[name="item[quantity][]"]');

    // Pobierz wartości netto, VAT i ilości z pól formularza w danym wierszu
    const unitNetPrice = parseFloat(unitNetPriceInput.value);
    const vat = parseFloat(vatInput.value);
    const quantity = parseFloat(quantityInput.value);

    // Oblicz wartość brutto dla danego wiersza
    const unitGrossPrice = unitNetPrice * (1 + vat / 100);
    const rowNetPrice = unitNetPrice * quantity;
    const rowGrossPrice = unitGrossPrice * quantity;

    // Uaktualnij tekst w odpowiednich elementach HTML
    unitGrossPriceSpan.textContent = unitGrossPrice.toFixed(2);
    rowNetPriceSpan.textContent = rowNetPrice.toFixed(2);
    rowGrossPriceSpan.textContent = rowGrossPrice.toFixed(2);

    // Aktualizuj wartości dla wszystkich wierszy
    updateAllRows();
}

// Funkcja aktualizująca wartości dla wszystkich wierszy
function updateAllRows() {
    // Pobierz wszystkie wiersze z tabeli
    const rows = document.querySelectorAll('.inventory tbody tr');

    // Iteruj przez każdy wiersz i aktualizuj wartości
    rows.forEach((row) => {
        const unitNetPrice = parseFloat(row.querySelector('input[name="item[unitNetPrice][]"]').value);
        const vat = parseFloat(row.querySelector('input[name="item[vat][]"]').value);
        const quantity = parseFloat(row.querySelector('input[name="item[quantity][]"]').value);

        const unitGrossPrice = unitNetPrice * (1 + vat / 100);
        const rowNetPrice = unitNetPrice * quantity;
        const rowGrossPrice = unitGrossPrice * quantity;

        row.querySelector('.unitGrossPrice').textContent = unitGrossPrice.toFixed(2);
        row.querySelector('.rowNetPrice').textContent = rowNetPrice.toFixed(2);
        row.querySelector('.rowGrossPrice').textContent = rowGrossPrice.toFixed(2);
    });
}

// Pobierz referencję do pierwszego wiersza
const firstRow = document.querySelector('.inventory tbody tr');

// Pobierz referencje do pól w pierwszym wierszu
const firstUnitNetPriceInput = firstRow.querySelector('input[name="item[unitNetPrice][]"]');
const firstVatInput = firstRow.querySelector('input[name="item[vat][]"]');
const firstQuantityInput = firstRow.querySelector('input[name="item[quantity][]"]');

// Dodaj nasłuchiwanie na zmianę wartości w polach pierwszego wiersza
firstUnitNetPriceInput.addEventListener('input', updateRowPrices);
firstVatInput.addEventListener('input', updateRowPrices);
firstQuantityInput.addEventListener('input', updateRowPrices);

// Aktualizuj wartości dla pierwszego wiersza
updateRowPrices.call(firstUnitNetPriceInput);



// Tabela balance


// Funkcja aktualizująca łączną sumę, łączny VAT i kwotę do zapłaty
function updateBalance() {
    // Pobierz wartość zaliczki wprowadzoną przez klienta
    const paymentInput = document.getElementById('paymentInput');
    const paymentAmount = parseFloat(paymentInput.value) || 0;

    // Pobierz wszystkie wiersze z tabeli
    const rows = document.querySelectorAll('.inventory tbody tr');

    let totalGross = 0; // łączna suma brutto
    let totalVat = 0; // łączny VAT

    // Iteruj przez każdy wiersz i dodaj sumy brutto i różnice pomiędzy sumą brutto a sumą netto do łącznych wartości
    rows.forEach((row) => {
        const rowGrossPrice = parseFloat(row.querySelector('.rowGrossPrice').textContent);
        const rowNetPrice = parseFloat(row.querySelector('.rowNetPrice').textContent);

        totalGross += rowGrossPrice;
        totalVat += rowGrossPrice - rowNetPrice;
    });

    // Oblicz kwotę do zapłaty
    const amountDue = totalGross - paymentAmount;

    // Zaktualizuj wartości w tabeli balance
    const totalGrossSpan = document.getElementById('totalGrossSpan');
    const totalVatSpan = document.getElementById('totalVatSpan');
    const amountDueSpan = document.getElementById('amountDueSpan');

    totalGrossSpan.textContent = totalGross.toFixed(2);
    totalVatSpan.textContent = totalVat.toFixed(2);
    amountDueSpan.textContent = amountDue.toFixed(2);
}

// Dodaj nasłuchiwanie na zmiany wartości brutto w wierszach oraz zmiany wartości zaliczki
const inventoryTable = document.querySelector('.inventory tbody');
inventoryTable.addEventListener('input', updateBalance);

const paymentInput = document.getElementById('paymentInput');
paymentInput.addEventListener('input', updateBalance);

// Wywołaj funkcję updateBalance po załadowaniu strony
updateBalance();
