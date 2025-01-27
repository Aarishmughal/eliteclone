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
    document.addEventListener("DOMContentLoaded", function () {
        var toastElList = [].slice.call(document.querySelectorAll(".toast"));
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, {
                delay: 5000,
            });
        });
        toastList.forEach((toast) => toast.show());
    });
});

let socialMediaCount = 1; // Counter for social media fields
const maxLinks = 9; // Maximum number of links

function addSocialMediaRow(event) {
    event.preventDefault(); // Prevent form submission

    if (socialMediaCount <= maxLinks) {
        const div = document.createElement("div");
        div.className = "row"; // Styling for the row

        div.innerHTML = `
                <div class="col-lg">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="socialPlatform${socialMediaCount}" name="socialPlatform${socialMediaCount}">
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
                        <input type="text" id="socialMedia${socialMediaCount}" name="socialMedia${socialMediaCount}" 
                            placeholder="Enter Social Media Link" class="form-control" />
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
        alert("Maximum of 9 social media links exceeded!");
    }
}

function removeSocialMediaRow(button) {
    const row = button.closest(".row"); // Get the closest row element
    document.getElementById("socialMediaLinks").removeChild(row);
    socialMediaCount--;
}
