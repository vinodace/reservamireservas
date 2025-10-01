// language-change.js

// Update phone numbers dynamically
function updatePhoneNumbers(lang) {
    const numbers = {
        es: "+52-800-801-7795",
        en: "+1-800-267-0020"
    };

    // Update all text elements
    document.querySelectorAll(".dynamic-phone").forEach(el => {
        el.textContent = numbers[lang];
    });

    // Update all clickable links
    document.querySelectorAll(".dynamic-phone-link").forEach(el => {
        el.href = "tel:" + numbers[lang].replace(/[^0-9+]/g, '');
    });

    // Optional label
    const phoneLabel = document.getElementById("headerPhoneText");
    if(phoneLabel){
        phoneLabel.textContent = lang === "en" ? "Speak to Expert Now" : "Hable ahora con un experto";
    }
}

// Main language change function
function changeLang(lang) {
    localStorage.setItem("siteLang", lang);
    document.cookie = "siteLang=" + lang + "; path=/";

    document.querySelectorAll("[data-lang]").forEach(el => {
        el.style.display = el.getAttribute("data-lang") === lang ? "block" : "none";
    });

    // Update phone numbers dynamically
    updatePhoneNumbers(lang);
}

// Detect language from IP (optional) and apply on first visit
fetch('https://ipapi.co/json/')
    .then(response => response.json())
    .then(data => {
        let lang = 'en'; // default English
        if (data.country === 'MX') lang = 'es'; // Mexican IP
        const storedLang = localStorage.getItem("siteLang");
        changeLang(storedLang || lang);
    })
    .catch(() => {
        const storedLang = localStorage.getItem("siteLang") || 'en';
        changeLang(storedLang);
    });

// DOM ready
document.addEventListener("DOMContentLoaded", () => {
    const storedLang = localStorage.getItem("siteLang") || "en"; // default English
    changeLang(storedLang);

    // Attach dropdown events
    document.querySelectorAll(".translate-dropdown .dropdown-item").forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const lang = item.querySelector("img").alt.toLowerCase() === "spanish" ? "es" : "en";
            changeLang(lang);
        });
    });
});
