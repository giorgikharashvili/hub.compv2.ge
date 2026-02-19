document.addEventListener('user-change', function (e) {
    const balance = e.detail.balance;

    const miniBalance = document.querySelector('.mini-balance-value');

    if (miniBalance) {
        const formatted = new Intl.NumberFormat('ru-RU').format(balance);

        miniBalance.textContent = formatted;
    }
});