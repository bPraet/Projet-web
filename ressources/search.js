function searchUser() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ulUsers");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function searchProduct() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ulProducts");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function searchOrder() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    div = document.getElementById("ulOrders");
    subdiv = div.getElementsByTagName("h2");
    for (i = 0; i < subdiv.length; i++) {
        a = subdiv[i].getElementsByClassName("btn")[0];
        txtValue = a.textContent || a.innerText;
        id = "heading" + i;
        line = document.getElementById(id)
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            line.style.display = "";
        } else {
            line.style.display = "none";
        }
    }
}