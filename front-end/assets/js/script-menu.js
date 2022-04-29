const menu = document.getElementsByClassName("hamburger-menu-container");
const menuShort = document.getElementsByClassName('short-menu');
const root = document.documentElement;

function closeMenu() {
    menuShort[0].style.display = "flex";
    menu[0].style.display = "none"
    menu[0].style.transform = "translateX(var(--menu-width-close))";
    menu[0].style.transition = "transform 280ms ease-out";
    root.style.setProperty('--video-content-width', '20%');
}

function openMenu() {
    menuShort[0].style.display = "none";
    menu[0].style.display = "flex"
    menu[0].style.transform = "translateX(var(--menu-width))";
    menu[0].style.transition = "transform 280ms ease-out";
    root.style.setProperty('--video-content-width', '15%');
    root.style.setProperty('--video-content-padding', '20px');
    root.style.setProperty('--video-content-minwidth', '220px');
}