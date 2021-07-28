function m(p) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var d = document.getElementById("d");
            d.innerHTML = text;
        }
    };

    r.open("GET", "index.php?p=" + p, true);
    r.send();

}