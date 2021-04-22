function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function logout() {
    document.cookie = "name=''; expires=Mon, 31 Dec 2018 12:00:00 UTC; path=/~madang/Web_Technologies/lab_10/;";
    window.location.reload(false);
}

function addItem() {
    var item = document.getElementById("item").value;
    var quantity = document.getElementById("quantity").value;
    if (quantity == "" || item == "" || quantity <= 0) {
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
    row.setAttribute("onclick", "deleteRow(" + n + ")");
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = n + ".";
    cell2.innerHTML = item;
    cell3.innerHTML = quantity;

    document.getElementById("item").value = "";
    document.getElementById("quantity").value = "";

}

function deleteRow(i) {
    if (confirm("Are you really sure you want to delete this row?")) {
        document.getElementById("growingTable").deleteRow(i);
        cart.splice(i - 1, 1);
        var jstring = JSON.stringify(cart);
        localStorage.setItem(sessionStorage.getItem("name"), jstring);
        window.location.reload(false);
    }
}

var name = getCookie("name");
if (name == "") {
    var name = prompt("Please enter your name: ");
    if (name != "" && name != null) {
        document.cookie = "name=" + name + "; path=/~madang/Web_Technologies/lab_10/;";
    }
}

sessionStorage.setItem("name", name);
document.getElementById("user").innerHTML = name + "'s Shopping List";

var userCart = localStorage.getItem(sessionStorage.getItem("name"));
if (userCart) {
    cart = JSON.parse(userCart);
} else {
    var cart = [];
}

for (var i = 0; i < cart.length; i++) {
    var t = document.getElementById("growingTable");
    var n = t.rows.length;
    
    var row = t.insertRow(n);
    row.setAttribute("onclick", "deleteRow(" + n + ")");
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    var add = cart[i];
    cell1.innerHTML = n + ".";
    cell2.innerHTML = add.item; 
    cell3.innerHTML = add.quantity;
}
