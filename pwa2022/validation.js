document.getElementById("submit").onclick = function (event) {
  var sendForm = true;
  document.getElementById("form").onsubmit=true;

  var titleElement = document.getElementById("title");
  var title = document.getElementById("title").value;
  if (title.length < 5 || title.length > 30) {
    sendForm = false;
    titleElement.style.border = "1px dashed red";
    document.getElementById("titleError").style.color="red";
    document.getElementById("titleError").innerHTML =
      "Title should be 5-30 characters long";
  } else {
    titleElement.style.border = "1px solid green";
    document.getElementById("titleError").innerHTML = "";
  }

  var summaryElement = document.getElementById("summary");
  var summary = document.getElementById("summary").value;
  if (summary.length < 10 || summary.length > 100) {
    sendForm = false;
    summaryElement.style.border = "1px dashed red";
    document.getElementById("summaryError").style.color="red";
    document.getElementById("summaryError").innerHTML =
      "Summary should be 10-100 characters long";
  } else {
    summaryElement.style.border = "1px solid green";
    document.getElementById("summaryError").innerHTML = "";
  }

  var textElement = document.getElementById("text");
  var text = document.getElementById("text").value;
  if (text.length == 0) {
    sendForm = false;
    textElement.style.border = "1px dashed red";
    document.getElementById("textError").style.color="red";
    document.getElementById("textError").innerHTML =
      "Article content is required";
  } else {
    textElement.style.border = "1px solid green";
    document.getElementById("textError").innerHTML = "";
  }

  var imageElement = document.getElementById("image");
  var image = document.getElementById("image").value;
  if (image.length == 0) {
    sendForm = false;
    imageElement.style.border = "1px dashed red";
    document.getElementById("imageError").style.color="red";
    document.getElementById("imageError").innerHTML = "Image is required";
  } else {
    imageElement.style.border = "1px solid green";
    document.getElementById("imageError").innerHTML = "";
  }

  var categoryElement = document.getElementById("category");
  if (document.getElementById("category").selectedIndex == 0) {
    sendForm = false;
    categoryElement.style.border = "1px dashed red";
    document.getElementById("categoryError").style.color="red";
    document.getElementById("categoryError").innerHTML = "Choose a category!";
  } else {
    categoryElement.style.border = "1px solid green";
    document.getElementById("categoryError").innerHTML = "";
  }

  if (sendForm != true) {
    event.preventDefault();
    document.getElementById("form").onsubmit=false;
  }
};
