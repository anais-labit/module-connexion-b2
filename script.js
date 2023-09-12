async function displayMessage() {
  const container = document.querySelector("#message");
  container.textContent = "";
  const reqLogin = new FormData(loginForm);

  try {
    const response = await fetch('./View/connexion.php', {
      method: "POST",
      body: reqLogin,
    });

    if (response.ok) {
      const result = await response.json();
      if (result.success) {
        container.textContent = result.message;
      } else {
        console.log("Informations incorrectes");
      }
    } else {
      console.error("Erreur lors de la requête");
    }
  } catch (error) {
    console.error("Erreur lors de la requête", error);
  }
}

displayMessage();

// async function login(ev) {
//   ev.preventDefault();

//   const reqLogin = new FormData(loginForm);

//   const requestOptions = {
//     method: "POST",
//     body: reqLogin,
//   };

//   let loginUser = await fetch("../src/View/connexion.php", requestOptions);

//   loginUser = await loginUser.json();
//   if (loginUser.success == false) {
//     container.textContent = "erreur";
//   } else if (loginUser.success == true) {
//     container.textContent = "succes";

//     location.reload();
//   }
// }
