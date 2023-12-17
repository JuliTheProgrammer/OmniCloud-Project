function calculatePrice() {
    var cpuPrice = document.getElementsByName('CPU')[0].value || 0;
    var ramPrice = document.getElementsByName('RAM')[0].value || 0;
    var ssdPrice = document.getElementsByName('SSD')[0].value || 0;

    var totalPrice = parseFloat(cpuPrice) + parseFloat(ramPrice) + parseFloat(ssdPrice);

    document.querySelector('.our-prices-charge p').textContent = totalPrice + ' .-';
}