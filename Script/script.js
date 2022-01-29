
function changeMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}


window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

        document.getElementById("navbar").style.background = "black";
    } else {

        document.getElementById("navbar").style.background = "none";
    }
}
