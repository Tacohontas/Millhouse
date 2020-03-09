// --- Visa bild innan den laddas upp i create-blogpost_form --- //
function preview_image(event) {
  let reader = new FileReader();
  reader.onload = () => {
    let output = document.querySelector(".upload_preview__img");
    let text = document.querySelector(".upload_preview__text");
    output.src = reader.result;

    getFileName = () => {
      let input = document.querySelector("#file");
      return input.value.split("\\").pop();
    };
    text.innerHTML = getFileName();
  };
  reader.readAsDataURL(event.target.files[0]);
}

//  --- Dubbelkolla så att admin vill ta bort inlägg. --- //

let deleteClass = document.querySelectorAll(".delete");
let publishClass = document.querySelectorAll(".publish");

let confirmDelete = function confirm_Choice(e) {
  let check = confirm("Är du säker på att du vill ta bort inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
};

let confirmPublish = function confirm_Choice(e) {
  let check = confirm("Är du säker på att du vill publicera inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
};

for (let i = 0; i < deleteClass.length; i++) {
  deleteClass[i].addEventListener("click", confirmDelete);
}

for (let i = 0; i < publishClass.length; i++) {
  publishClass[i].addEventListener("click", confirmPublish);
}

// --- Hindra inlägg för att postas om det innehåller för många tecken --- //
let createBtn = document.querySelector(".create_btn");
let radioButtons = document.querySelectorAll(".input__radio");

let checkForErrors = function stopFromPosting(e) {
  // Kolla ifall det är för många tecken
  let error = true;
  let textarea = document.getElementById("content");
  CKEDITOR.instances.content.updateElement();
  if (textarea.value.length > 2000) {
    alert("Inlägget är för långt!");
    e.preventDefault();
    return;
  }

  // Kolla ifall någon kategori är vald
  for (let i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked == true) {
      error = false;
    }
  }

  if (error == true) {
    alert("Du måste välja en kategori!");
    e.preventDefault();
    return;
  }
};

createBtn.addEventListener("click", checkForErrors);

