
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
    });
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
}

displayRegisterMessage();

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
    });
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
}

displayLoginMessage();

