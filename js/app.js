console.log("sdszz");

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

// Dubbelkolla så att admin vill ta bort inlägg.

let deleteClass = document.querySelectorAll(".delete");
let publishClass = document.querySelectorAll(".publish");

let confirmDelete = function confirm_Choice(e){
  var check = confirm("Är du säker på att du vill ta bort inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
}

let confirmPublish= function confirm_Choice(e){
  var check = confirm("Är du säker på att du vill publicera inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
}

for(let i = 0; i<deleteClass.length; i++){
  deleteClass[i].addEventListener("click", confirmDelete);
};

for(let i = 0; i<publishClass.length; i++){
publishClass[i].addEventListener("click", confirmPublish);
};

