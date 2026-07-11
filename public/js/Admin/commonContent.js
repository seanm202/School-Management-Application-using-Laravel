// Go to top button
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// 

// 

// 



function showSuccess(message = "✅ Data saved successfully!") {
    const box = document.getElementById("successBox");
    const messageBox = document.getElementById("successMessage");

    // Set the custom message
    messageBox.textContent = message;

    box.classList.add("show");

    // Auto hide after 3 seconds
    setTimeout(() => {
        box.classList.remove("show");
    }, 3000);
}

function closeSuccess() {
    document.getElementById("successBox").classList.remove("show");
}


let errorTimer;

function showError(errorMessages) {

    const box = document.getElementById("errorShowBox");
    const content = document.getElementById("contentOfErrorShowBox");

    // Cancel previous timer
    clearTimeout(errorTimer);

    // Remove previous errors
    content.innerHTML = "";

    // Convert a single error into an array
    if (!Array.isArray(errorMessages)) {
        errorMessages = [errorMessages];
    }

    errorMessages.forEach(function(message) {

        const errorDiv = document.createElement("div");
        errorDiv.className = "alert alert-danger mt-2";

        errorDiv.innerHTML = `
            <div class="d-flex justify-content-between align-items-start">
                <span>${message}</span>
                <button type="button" class="my-close">&times;</button>
            </div>
        `;

        // Close button
        const btn = errorDiv.querySelector(".my-close");

        btn.onclick = function () {
            errorDiv.remove();

            // Hide the container if no messages remain
            if (content.children.length === 0) {
                box.classList.remove("show");
            }
        };

        content.appendChild(errorDiv);
    });

    // Show the error container
    box.classList.add("show");

    // Auto-hide after 5 seconds
    errorTimer = setTimeout(function () {
        content.innerHTML = "";
        box.classList.remove("show");
    }, 5000);
}

function closeError() {
    document.getElementById("errorShowBox").classList.remove("show");
}


function jsdisplaycustomerrors(errors)
{

const content = document.getElementById("contentOfErrorShowBox");
content.innerHTML = ''; // clear previous errors

for (var field in errors) {
    showError(errors[field][0]);
}
return;
}