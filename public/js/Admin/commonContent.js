
//
 function showSuccess() {
    const box = document.getElementById("successBox");

    box.classList.add("show");

    // Auto hide after 3 seconds
    setTimeout(() => {
        box.classList.remove("show");
    }, 3000);
}

function closeSuccess() {
    document.getElementById("successBox").classList.remove("show");
}
    //
    // For Deletion
    //

    function showDeleteSuccess() {
    const box = document.getElementById("deleteSuccessBox");

    box.classList.add("show");

    // Auto hide after 3 seconds
    setTimeout(() => {
        box.classList.remove("show");
    }, 3000);
}

function closeDeleteSuccess() {
    document.getElementById("deleteSuccessBox").classList.remove("show");
}

function showError(errorMessage) {

    const box = document.getElementById("errorShowBox");
    const content = document.getElementById("contentOfErrorShowBox");

    const errorDiv = document.createElement("div");
    errorDiv.className ="alert bg-danger text-white mt-2";
    errorDiv.textContent = errorMessage;

    content.appendChild(errorDiv);

    box.classList.add("show");

    setTimeout(() => {
        box.classList.remove("show");
    }, 3000);
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