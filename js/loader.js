window.addEventListener("load", () => {
    const principal = document.querySelector(".principal");

    principal.classList.add("principal--hidden");
    principal.addEventListener("transitionend", () => {
        document.body.removeChild(principal);
    })
})