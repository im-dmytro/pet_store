
function openNav() {
    const burger = document.getElementById('nav-icon2');
    burger.classList.toggle('open');
    document.getElementById("mySidenav").style.width = "100%";

    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav(burger) {
    burger.classList.toggle('open');

    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.zIndex = '999';
    document.body.style.backgroundColor = "white";
}