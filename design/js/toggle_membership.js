// toggle membership
let buttonsToggle = document.getElementById('.account-info_toggle');
let buttonMembership = document.getElementById('membership-btn');
let buttonPayment = document.getElementById('payment-btn');
let membership = document.getElementById('membership');
let payment = document.getElementById('payment');

buttonMembership.onclick = function() {
    buttonMembership.classList.toggle('toggle_active-btn');
    buttonPayment.classList.toggle('toggle_active-btn');
    if (buttonMembership.classList.contains('toggle_active-btn')) {
        payment.style.display = 'none';
        membership.style.display = 'block';
        document.getElementById('blue-bord2').style.display = 'none';
        document.getElementById('blue-bord1').style.display = 'block';

    }
};
buttonPayment.onclick = function() {
    buttonMembership.classList.toggle('toggle_active-btn');
    buttonPayment.classList.toggle('toggle_active-btn');
    if (buttonPayment.classList.contains('toggle_active-btn')) {
        payment.style.display = 'block';
        membership.style.display = 'none';
        document.getElementById('blue-bord1').style.display = 'none';
        document.getElementById('blue-bord2').style.display = 'block';

    }
};
// show payment form for edition
let openCardButton = document.getElementById('open-card');
let closeCardButton = document.getElementById('close-card');

openCardButton.onclick = function() {
    document.getElementById('card1').style.display = 'none';
    document.getElementById('card2').style.display = 'block';
}
closeCardButton.onclick = function() {
    document.getElementById('card2').style.display = 'none';
    document.getElementById('card1').style.display = 'block';
}