// Валидация формы
const nameInput = document.querySelector(".user-name");
const phoneInput = document.querySelector(".user-phone");
const checkboxInput = document.querySelector("#checkbox");

if (localStorage.name) {
  nameInput.value = localStorage.name;
}

if (localStorage.telephone) {
  phoneInput.value = localStorage.telephone;
}

const nameCheck = (input) => /^[а-яА-ЯёЁa-zA-Z0-9]+$/.test(input.value.trim());

const telephoneCheck = (input) =>
  /^((8|\+7)[-]?)?(\(?\d{3}\)?[-]?)?[\d\- ]{7,10}$/.test(input.value);

const formValidate = () => {
  let errors = 0;

  if (!nameCheck(nameInput)) {
    nameInput.classList.add("error");
    errors++;
  } else {
    localStorage.setItem("name", nameInput.value);
  }

  if (!telephoneCheck(phoneInput)) {
    phoneInput.classList.add("error");
    errors++;
  } else {
    localStorage.setItem("telephone", phoneInput.value);
  }

  if (checkboxInput.checked === false) {
    checkboxInput.classList.add("error-checkbox");
    errors++;
  }

  return errors;
};

const form = document.querySelector("#user-data");
const order = new bootstrap.Offcanvas("#offcanvasExample1");
const succesMsg = new bootstrap.Offcanvas("#offcanvasExample2");

const url =
  "http://alex-shevtsov-WP/wp-content/themes/alex-shevtsov/server/send.php";

form.addEventListener("submit", (evt) => {
  evt.preventDefault();
  let errors = formValidate(form);
  if (errors === 0) {
    let formData = new FormData(form);
    let response = fetch(url, {
      method: "POST",
      body: formData,
    });
    if (!response.ok) {
      order.hide();
      succesMsg.show();
    } else {
      alert("Не удается установить соединение. Поробуйте еще раз");
    }
  }
});
