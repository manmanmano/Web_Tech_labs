var personName = prompt("Please enter your name");
while (true) {
    if (personName === "") {
        alert("Input left blank!");
        personName = prompt("Please enter your name");
    } else {
        break;
    }
}
document.cookie = "name=" + personName + ";path=/~madang/Web_Technologies/lab_10/;";
sessionStorage.setItem("name", personName);
