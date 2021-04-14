function createCookie() {
    var name = document.myForm.name.value;
    if (name === "") {
        alert("Input left blank!");
        return;
    }
    document.cookie = "name=" + name + ";path=/~madang/Web_Technologies/lab_10/;";
    sessionStorage.setItem("name", name);
}
