document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("a.unavailable").forEach(a => {
        a.href = "";
        a.addEventListener("click", event => event.preventDefault());
    });
})