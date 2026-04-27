document.addEventListener("DOMContentLoaded", () => {
    const locator = document.getElementById("locator");
    document.querySelectorAll("input[type='radio'][name='dash-tab']").forEach(e => {
        e.addEventListener("change", () => locator.textContent = e.value);
    });
});