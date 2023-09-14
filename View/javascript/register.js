async function displayRegisterMessage() {
  try {
    const response = await fetch("inscription.php");
    const content = await response.text();

    const signUpBtn = document.querySelector("#signUpBtn");
    const form = document.querySelector("#registerForm");

    signUpBtn.addEventListener("click", async function (event) {
      event.preventDefault();
      const data = new FormData(form);
      data.append("submitForm", "");
      console.log(data);

      const response = await fetch("inscription.php", {
        method: "POST",
        body: data,
      });

      const jsonResponse = await response.json();

      const container = document.querySelector("#message");
      container.textContent = jsonResponse.message;

      setTimeout(function () {
        window.location.href = "connexion.php";
      }, 2000);
    });
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
}

displayRegisterMessage();
