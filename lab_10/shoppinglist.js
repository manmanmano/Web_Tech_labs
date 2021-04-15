var userName = prompt("Please enter your name");
while (true) {
    if (userName === "") {
        alert("Input left blank!");
        userName = prompt("Please enter your name");
    } else {
        break;
    }
}
document.cookie = "name=" + userName + ";path=/~madang/Web_Technologies/lab_10/;";
sessionStorage.setItem("name", userName);
document.getElementById("userName").innerHTML = userName + "'s Shopping List";
