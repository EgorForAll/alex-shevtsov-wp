// Определяем содержимое DOM элементов исходя из размеров экрана
const DESK_WIDTH = 1025;
const subtitle = document.querySelector("#subtitle");
const firstLink = document.querySelector("#first-link");
const secondLink = document.querySelector("#second-link");
const tech = document.querySelector("#tech");
const prod = document.querySelector("#prod");

if (window.innerWidth < DESK_WIDTH) {
  subtitle.textContent = "Ваш успех зависит от ваших действий";
  firstLink.textContent = "Записаться";
  secondLink.textContent = "Заказать звонок";
  tech.textContent = "техники";
  prod.textContent = "продуктивности";
} else {
  subtitle.textContent =
    "Когда ваше время и энергия лучше сфокусированы, стремление к новым возможностям становится реальностью,  ваш успех зависит от ваших действий";
  firstLink.textContent = "Записаться на консультацию";
  secondLink.textContent = "Бесплатная консультация";
  tech.textContent = "техник для достижения целей";
  prod.textContent = "увеличение личной продуктивности";
}
