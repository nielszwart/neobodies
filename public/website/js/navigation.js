window.onload = prepareNavigation;

function prepareNavigation() {
    document.getElementById('toggle-menu').onclick = function () {
        var nav = document.getElementById('mobile-menu-list');
        if (nav.classList.contains("open")) {
            nav.classList.remove("open");
        } else {
            nav.classList.add("open");
        }
    };
}

