window.onload = function () {
    mostraMessaggioErrore();
};

function mostraMessaggioErrore() {
    const urlParams = new URLSearchParams(window.location.search);
    const messaggio = urlParams.get("m_r");
    if (messaggio) {
        const alertContainer = document.getElementById("alert-container");
        const alertDiv = document.createElement("div");

        alertDiv.classList.add("alert", "show", "showAlert");

        alertDiv.innerHTML = `
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">${messaggio}</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        `;
        alertContainer.appendChild(alertDiv);

        // codice che ripulisce l'URL
        const newUrl = window.location.origin + window.location.pathname;
        window.history.replaceState(null, document.title, newUrl);

        setTimeout(() => {
            alertDiv.classList.remove("show");
            alertDiv.classList.add("hide");
            setTimeout(() => {
                alertDiv.remove();
                document.body.style.overflow = ""; // ripristina lo scroll una volta rimosso l'alert
            }, 900);
        }, 5000);

        document.querySelector(".close-btn").addEventListener("click", function () {
            alertDiv.classList.remove("show");
            alertDiv.classList.add("hide");
            setTimeout(() => {
                alertDiv.remove();
                document.body.style.overflow = ""; // ripristina lo scroll una volta rimosso l'alert
            }, 900);
        });

        // nascondi le barre di scorrimento laterali e inferiori del browser quando l'alert è visibile
        document.body.style.overflow = "hidden";
    }
}
