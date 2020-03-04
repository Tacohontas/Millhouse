console.log("TJENAREJEEEHH");

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

var aElems = document.querySelector(".delete");

aElems.addEventListener("click", function(e) {
  var check = confirm("Är du säker på att du vill ta bort inlägget?");
  if (check == true) {
    return true;
  } else {
    e.preventDefault();
  }
});
