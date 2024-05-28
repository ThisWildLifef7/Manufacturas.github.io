const phoneInputField = document.querySelector("#phone");

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

