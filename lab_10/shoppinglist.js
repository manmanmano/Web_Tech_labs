function createCookie() {
    var username = document.myForm.username.value;
    if (username == "") {
        alert("Input left blank!");
        return;
    }
     document.cookie = "username=" + username + ";path=/~madang/Web_Technologies/lab_10/";
}

