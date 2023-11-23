var loader = document.querySelector('.loader');
var btnTheme = document.querySelector('.theme-btn');
var btnCard = document.getElementById('card-btn');
var stocks = document.getElementById('runningString');

var isVisited = sessionStorage.getItem('visited') || false;

if (!isVisited) {
    loader.style.display = 'block';
    btnTheme.style.display = "none";
    stocks.style.display = "none";
    btnCard.style.display = "none";
    document.body.style.overflow = 'hidden';

    sessionStorage.setItem('visited', 'true');

    setTimeout(function() {
        loader.style.display = 'none';
        btnTheme.style.display = "block";
        btnCard.style.display = "block";
        stocks.style.display = "block";
        document.body.style.overflow = '';
    }, 2000);
} else {
    loader.style.display = 'none';
    btnTheme.style.display = "block";
    btnCard.style.display = "block";
    stocks.style.display = "block";
    document.body.style.overflow = '';
}
