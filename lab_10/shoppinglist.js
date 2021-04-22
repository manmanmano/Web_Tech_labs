function checkInput(user) {
    while (true) {
        if (user === "" || user === null) {
            alert("input left blank!");
            user = prompt("please enter your name");
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

function addItem() {
    var item = document.getElementById("item").value;
    var quantity = document.getElementById("quantity").value;
    if (quantity == "" || item == "" || quantity < 0) {
        alert("Invalid input in form!");
        return;
    }


    var add = {item: item, quantity: quantity};
    cart.push(add);
    var jstring = JSON.stringify(cart);

    localStorage.setItem(sessionStorage.getItem("name"), jstring)

    var t = document.getElementById("growingTable");
    var n = t.rows.length;
    
    var row = t.insertRow(n);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = n + ".";
    cell2.innerHTML = item;
    cell3.innerHTML = quantity;

    document.getElementById("item").value = "";
    document.getElementById("quantity").value = "";

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

if (document.cookie != "") {
    cart = JSON.parse(localStorage.getItem(name));
} else {
    var cart = [];
}


for (var i = 0; i < cart.length; i++) {
    var t = document.getElementById("growingTable");
    var row = t.insertRow(i + 1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = i + 1 + ".";
    cell2.innerHTML = item;
    cell3.innerHTML = quantity;
}
