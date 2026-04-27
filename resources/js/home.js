// DOM references

const labelBrowserBtn = document.getElementById("open-label-browser");
const labelBrowser = document.getElementById("label-browser");
const allLabelClickables = document.querySelectorAll("[class$=-label]");
const expenseForm = document.getElementById("add-expense-form");
/*
const cuttinEdgeAnchor = document.getElementById("ce-anchor");
const cuttinEdgeBackdrop = document.getElementById("ce-backdrop");
*/

labelBrowserBtn.addEventListener("click", () => {
    if (labelBrowserBtn.textContent === "Expand")
        labelBrowserBtn.textContent = "Collapse";
    else
        labelBrowserBtn.textContent = "Expand";

    labelBrowser.hidden = !labelBrowser.hidden;
});

allLabelClickables.forEach(label => {
    label.onclick = () => {
        label.classList.toggle("selected");
    };
});

expenseForm.addEventListener("submit", event => {
    event.preventDefault();
    denotify();

    const data = new FormData(event.currentTarget);

    if (data.get("type") !== "recurring" && data.get("type") !== "one-time") {
        notify("Please select a valid expense type");
        return;
    }

    if (data.get("type") === "recurring" && !data.get("period")) {
        notify("Please select a valid billing period");
        return;
    }

    if (data.get("amount") < 0) {
        notify("Amount must be greater than 0");
        return;
    }

    document.querySelectorAll(".expense-label").forEach(label => {
        if (!label.classList.contains("selected")) return;
        data.append("labels[0][]", label.textContent.trim());
    });

    console.log(data.getAll("labels[0][]"))
});

/*
cuttinEdgeAnchor.addEventListener("mouseenter", () => {
    cuttinEdgeBackdrop.classList.add("hovered");
});

cuttinEdgeAnchor.addEventListener("mouseleave", () => {
    cuttinEdgeBackdrop.classList.remove("hovered");
});
*/

function notify(msg) {
    document.getElementById("notifier").hidden = false;
    document.getElementById("notifier").textContent = msg;
}

function denotify() {
    document.getElementById("notifier").hidden = true;
}