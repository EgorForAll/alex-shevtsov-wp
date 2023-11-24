// Получаем сумму цифр даты и вставляем ее в DOM

const dateUrl =
  "http://alex-shevtsov-WP/wp-content/themes/alex-shevtsov/server/date.php";

const numberDomElement = document.querySelector("#numberDate");
let xhr1 = new XMLHttpRequest();
xhr1.open("GET", dateUrl, false);
xhr1.send();
const numberDate = xhr1.responseText;
if (numberDate) {
  numberDomElement.textContent = `${numberDate}+`;
}

// Получаем курс фунта стрерлинга

const gbrUrl =
  "http://alex-shevtsov-WP/wp-content/themes/alex-shevtsov/server/gbr.php";
const moneyDomElement = document.querySelector("#money");
let xhr2 = new XMLHttpRequest();
xhr2.open("GET", gbrUrl, false);
xhr2.send();
const moneyValue = xhr2.responseText;
if (moneyValue) {
  moneyDomElement.textContent = `${moneyValue}%`;
}
