function checkInput(userName) {
    while (true) {
        if (userName === "") {
            alert("input left blank!");
            userName = prompt("please enter your name");
        } else {
            break;
        }
    }
    return userName;
}

var userName = prompt("Please enter your name");
userName = checkInput(userName);
document.cookie = "name=" + userName + ";path=/~madang/Web_Technologies/lab_10/;";
sessionStorage.setItem("name", userName);
document.getElementById("userName").innerHTML = userName + "'s Shopping List";
