function checkInput(user) {
    while (true) {
        if (user === "" || user === null) {
            alert("Input left blank!");
            user = prompt("Please enter your name");
        } else {
            break;
        }
    }
    return user;
}

function logout() {
    document.cookie = "name=''; expires=Mon, 31 Dec 2018 12:00:00 UTC; path=/~madang/Web_Technologies/lab_10/;";
    window.location.reload(false);
}

if (document.cookie == "") {
    var name = prompt("Please enter your name: ");
    name = checkInput(name);
    if (name != "" && name != null) {
        document.cookie = "name=" + name + "; path=/~madang/Web_Technologies/lab_10/;";
    }
}

sessionStorage.setItem("name", name);
document.getElementById("user").innerHTML = name + "'s Shopping List";
