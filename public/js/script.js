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

    // Toast Generation
    document.addEventListener("DOMContentLoaded", function () {
        var toastElList = [].slice.call(document.querySelectorAll(".toast"));
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, {
                delay: 5000,
            });
        });
        toastList.forEach((toast) => toast.show());
    });

    // Tooltip Initialization
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});

// Social Media Fields
let socialMediaCount = 1;
const maxLinks = 5;

function addSocialMediaRow(event) {
    event.preventDefault();

    if (socialMediaCount <= maxLinks) {
        const div = document.createElement("div");
        div.className = "row";

        div.innerHTML = `
                <div class="col-lg">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="socialPlatform${socialMediaCount}" name="socialMedia[${socialMediaCount}][platform]">
                            <option value="Facebook">Facebook</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Instagram">Instagram</option>
                            <option value="YouTube">YouTube</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="socialPlatform${socialMediaCount}">Select Platform</label>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="form-floating mb-3">
                        <input type="text" id="socialMedia${socialMediaCount}" 
                            name="socialMedia[${socialMediaCount}][link]" 
                            placeholder="Enter Social Media Link" 
                            class="form-control" />
                        <label for="socialMedia${socialMediaCount}">Social Media Link</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="pb-3">
                        <button class="btn btn-danger w-100 h-100 p-3" style="font-family:'Inter';" onclick="removeSocialMediaRow(this)"><i class="bi bi-trash-fill"></i></button>
                    </div>    
                </div>
            `;
        document.getElementById("socialMediaLinks").appendChild(div);
        socialMediaCount++;
    } else {
        alert(`Maximum of ${maxLinks} social media links exceeded!`);
    }
}

function removeSocialMediaRow(button) {
    const row = button.closest(".row");
    document.getElementById("socialMediaLinks").removeChild(row);
    socialMediaCount--;
}
