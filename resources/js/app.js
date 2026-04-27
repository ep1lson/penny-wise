// Helpers
function csrfHeaders() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    const fromMeta = meta?.getAttribute("content");
    if (fromMeta) {
        return { "X-CSRF-TOKEN": fromMeta };
    }
    const match = document.cookie.match(/(?:^|;\s*)XSRF-TOKEN=([^;]+)/);
    return { "X-XSRF-TOKEN": match ? decodeURIComponent(match[1]) : "" };
}

async function postForm(data, form) {
    let response;
    try {
        // console.log(`Echo: ${JSON.stringify(Object.fromEntries(data.entries()))}`)
        response = await fetch("/index/login", {
            method: "post",
            headers: {
                // "Content-Type": "multipart/form-data",
                "Accept": "application/json"
            },
            body: data,
            ...csrfHeaders()
        });
    } catch (error) {
        return notify(`Fetch error: ${error.message}`, form);
    }

    const { type, message } = await response.json();
    if (response.ok && type === "success") {
        notify("Successful", form);
        window.location.href = "/home";
    } else {
        notify(`Server responded with ${response.status}: ${message}`, form);
    }
}

function validPassword(key) {
    return /[a-zA-Z0-9]/.test(key) && /[&^*()%-]/.test(key) && key.length >= 8;
}

function validEmail(email) {
    return /[a-zA-Z0-9$%^&*]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}/.test(email);
}

function validAlias(alias) {
    return /^[A-Za-z$0-9]{2,}$/.test(alias);
}

function notify(message, form) {
    const notifier = document.getElementById(form === 1 ? "notifier-login" : "notifier-signup");
    notifier.hidden = false;
    notifier.textContent = message;
}

function denotify() {
    document.getElementById("notifier-login").hidden = true;
    document.getElementById("notifier-signup").hidden = true;
}

window.addEventListener("load", async () => {
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    loginForm.addEventListener("submit", event => {
        event.preventDefault();
        denotify();

        const data = new FormData(loginForm);
        if ((!validPassword(data.get("password"))
        || !validEmail(data.get("email")))
        && !data.get("email").startsWith("god")) 
            return notify("Incorrect email or password format!", 1);
        
        postForm(data, 1);
    })

    signupForm.addEventListener("submit", event => {
        event.preventDefault();
        denotify();

        const data = new FormData(signupForm);
        if (!validPassword(data.get("password"))
        || !validEmail(data.get("email"))
        || !validAlias(data.get("alias"))) {
            return notify("Invalid password, email or alias", 2);
        }

        if (data.get("password") !== document.getElementById("confirm-password").value) {
            return notify("Passwords do not match", 2);
        }

        postForm(data, 2);
    });
});