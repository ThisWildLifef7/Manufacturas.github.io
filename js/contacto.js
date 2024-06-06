const phoneInputField = document.querySelector("#phone");
const btn = document.getElementById('btn');
const form = document.getElementById('lookup')

window.intlTelInput(phoneInputField, {
  initialCountry: "auto",
  separateDialCode: true,
  geoIpLookup: callback => {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript:
    "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/utils.js",
});

form.addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'Enviando...';

   const serviceID = 'default_service';
   const templateID = 'template_v0skm3o';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Mensaje enviado';
      alert('El mensaje fue enviado!');
    }, (err) => {
      btn.value = 'El mensaje no fue enviado';
      alert(JSON.stringify(err));
    });
});

document.addEventListener('DOMContentLoaded', function () {
  form.addEventListener('submit', function () {
      form.reset();
  })
})