document.addEventListener("DOMContentLoaded", function () {
    const themeToggleButton = document.getElementById("theme-toggle");
    const htmlElement = document.documentElement;

    const savedTheme = localStorage.getItem("theme") || "light";
    htmlElement.setAttribute("data-bs-theme", savedTheme);
    updateToggleIcon(savedTheme);

    themeToggleButton.addEventListener("click", function () {
        const currentTheme = htmlElement.getAttribute("data-bs-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        htmlElement.setAttribute("data-bs-theme", newTheme);
        localStorage.setItem("theme", newTheme);
        updateToggleIcon(newTheme);
    });

    // Update the toggle button icon
    function updateToggleIcon(theme) {
        const icon = themeToggleButton.querySelector("i");
        icon.className = theme === "dark" ? "bi bi-sun" : "bi bi-moon";
    }
});
