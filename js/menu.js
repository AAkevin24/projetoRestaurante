var abrir = document.getElementById("bar")
abrir.addEventListener("click", function (param) {
    menubar('mei');
});

function menubar(click) {
    var modal = document.getElementById(click);
    modal.classList.add('display');
}
