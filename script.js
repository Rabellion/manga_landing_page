document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".subscribe-form form").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("submit.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === "success") {
                this.reset();
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
