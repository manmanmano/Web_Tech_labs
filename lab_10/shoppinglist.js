function checkInput(user) {
    while (true) {
        if (user === "") {
            alert("input left blank!");
            user = prompt("please enter your name");
        } else {
            break;
        }
    }
    return user;
}

var user = prompt("Please enter your name");
user = checkInput(user);
document.cookie = "name=" + user + ";path=/~madang/Web_Technologies/lab_10/;";
sessionStorage.setItem("name", user);
document.getElementById("user").innerHTML = user + "'s Shopping List";
