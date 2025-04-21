function changeTheme() {
    const logo = document.getElementById('theme-logo');
    const path = window.location.pathname;

    document.body.classList.toggle('dark-theme');


    if (path === '/' || path.endsWith('index.php')) {

        if (document.body.classList.contains('dark-theme')) {
            logo.src = "image/moon.png";
            localStorage.setItem('theme', 'dark');
        } else {
            logo.src = "image/sun.png";
            localStorage.setItem('theme', 'light');
        }
    } else {
        if (document.body.classList.contains('dark-theme')) {
            logo.src = "../image/moon.png";
            localStorage.setItem('theme', 'dark');
        } else {
            logo.src = "../image/sun.png";
            localStorage.setItem('theme', 'light');
        }
    }


}

window.onload = function () {
    const savedTheme = localStorage.getItem('theme');
    const logo = document.getElementById('theme-logo');
    const path = window.location.pathname;

    if (path === '/' || path.endsWith('index.php')) {

        if (savedTheme === 'dark') {
            document.body.classList.add('dark-theme');
            logo.src = "image/moon.png";
        } else {
            document.body.classList.remove('dark-theme');
            logo.src = "image/sun.png";
        }
    }
    else{
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-theme');
            logo.src = "../image/moon.png";
        } else {
            document.body.classList.remove('dark-theme');
            logo.src = "../image/sun.png";
        }
    }





};