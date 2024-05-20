const counters = document.querySelectorAll('.counter');
let speed = 100;

counters.forEach((counter, index) => {
    function UpdateCounter() {
        const targetNumber = +counter.dataset.target;
        const initialNumber = +counter.innerText;
        const incPerCount = targetNumber / speed;
        if (initialNumber < targetNumber) {
            counter.innerText = Math.ceil(initialNumber + incPerCount);
            setTimeout(UpdateCounter, 40);
        }
    }
    UpdateCounter();
})

// scroll animation
let CounterObserver = new IntersectionObserver((entries, observer) => {
    let[entry] = entries;
    if (!entry.isIntersecting) return;
    
    counters.forEach((counter, index) => {
        function UpdateCounter() {
            const targetNumber = +counter.dataset.target;
            const initialNumber = +counter.innerText;
            const incPerCount = targetNumber / speed;
            if (initialNumber < targetNumber) {
                counter.innerText = Math.ceil(initialNumber + incPerCount);
                setTimeout(UpdateCounter, 40);
            }
        }
        UpdateCounter();

        if (counter.parentElement.style.animation) {
            counter.parentElement.style.animation = "";
        }else {
            counter.parentElement.style.animation = `slide-up 0.3s ease forwards ${index / counters.length + 0.5}`
        }
    });
}, {
    root: null,
    threshold: 0.4,
});

CounterObserver.observe()