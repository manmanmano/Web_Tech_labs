var personName = prompt("Please enter your name");
document.cookie = "name=" + personName + ";path=/~madang/Web_Technologies/lab_10/;";
sessionStorage.setItem("name", personName);
