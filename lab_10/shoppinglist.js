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

    var inList = JSON.stringify({Item: item, Quantity: quantity});

    var t = document.getElementById("growingTable");
    var n = t.rows.length;
    
    var row = t.insertRow(n);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    var l = JSON.parse(inList);
    cell1.innerHTML = n + ".";
    cell2.innerHTML = l.Item;
    cell3.innerHTML = l.Quantity;

    localStorage.setItem(sessionStorage.getItem("name") + n, inList);

    window.location.reload(false);
}

function deleteRecord(table, index) {
    if (confirm("Are you sure you want to delete this row?")) {
        table.deleteRow(index);
    }
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

for (var i = 0; i < localStorage.length; i++) {
    var t = document.getElementById("growingTable");
    var row = t.insertRow(i + 1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    row.setAttribute("onclick", "deleteRecord(t, i)");

    var l = JSON.parse(localStorage.getItem(localStorage.key(i)));
    cell1.innerHTML = i + 1 + ".";
    cell2.innerHTML = l.Item;
    cell3.innerHTML = l.Quantity;
}
