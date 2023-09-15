const updateForm = document.querySelector("#updateForm");
const updateButton = document.querySelector("#updateButton");


async function updateSelf() {
  const reqUpdate = new FormData(updateForm);

  console.log(updateForm);
  reqUpdate.append("updateProfile", "updateProfile");

  console.log(reqUpdate);

  const options = {
    method: "POST",
    body: reqUpdate,
  };

  const updateUser = await fetch("profil.php", options);
  const msg = await updateUser.json();
  console.log(msg.errors);

  document.querySelector("#msgContainer");
  // let msg = document.createElement('p');
  if (msg.errors) {
    msgContainer.innerHTML = msg.errors;
  } else {
    msgContainer.innerHTML = msg.success;
  }
}

updateButton.addEventListener("click", async (event) => {
  event.preventDefault();
  updateSelf();
});
