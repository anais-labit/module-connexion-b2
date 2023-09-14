async function displayLoginMessage() {
  try {
    const response = await fetch("connexion.php");
    const content = await response.text();

    const signInBtn = document.querySelector("#signInBtn");
    const form = document.querySelector("#loginForm");

    signInBtn.addEventListener("click", async function (event) {
      event.preventDefault();
      const data = new FormData(form);
      data.append("submitForm", "");
      console.log(data);

      const response = await fetch("connexion.php", {
        method: "POST",
        body: data,
      });

      const jsonResponse = await response.json();

      const container = document.querySelector("#message");
      container.textContent = jsonResponse.message;

      setTimeout(function () {
        window.location.href = "index.php";
      }, 2000);        
      
    });
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
}

displayLoginMessage();
