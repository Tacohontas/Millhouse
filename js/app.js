
// --- Visa bild innan den laddas upp i create-blogpost_form --- //
function preview_image(event) {
  let reader = new FileReader();
  reader.onload = () => {
    let imagePreviewOutput = document.querySelector(".upload_preview__img");
    let imageName = document.querySelector(".upload_preview__text");
    imagePreviewOutput.src = reader.result;

    getFileName = () => {
      let input = document.querySelector("#file");
      return input.value.split("\\").pop();
    };
    imageName.innerHTML = getFileName();
  };

  // Kollar ifall filen har något av de accepterade formaten som är satta i handle_blogposts.php
  let fileName = event.target.files[0].name;
  let allowedFormats = ["jpg", "jpeg", "png"];

  fileExtension = fileName.split(".");
  fileExtension = fileExtension[fileExtension.length - 1];

  // Om filen är för stor så skall den ej laddas upp.
  if (event.target.files[0].size > 2000000) {
    alert("Filen är för stor. Den får vara max 2mb!");
  } else if (!allowedFormats.includes(fileExtension)) {
    // Om filändelsen ej är med i allowedFormats-arrayen så är det antagligen en annan slags fil.
    alert("Filen är i fel format. Filen måste vara i JPEG, JPG eller PNG.");
  } else {
    reader.readAsDataURL(event.target.files[0]);
  }
}

//  --- Bekräfta Action gjord av Admin. --- //
let deleteClass = document.querySelectorAll(".delete");
let publishClass = document.querySelectorAll(".publish");

//  --- Dubbelkolla så att admin vill ta bort inlägg. --- //
let confirmDelete = function confirm_Choice(e) {
  let check = confirm("Är du säker på att du vill ta bort inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
};
//  --- Dubbelkolla så att admin vill publicera inlägg. --- //
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
    alert(
      `Inlägget är för långt! Du behöver ta bort ${textarea.value.length -
        2000} tecken`
    );
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
