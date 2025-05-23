function getCookie(name) {
    let cookies = document.cookie.split("; ");
    for (let cookie of cookies) {
        let [key, value] = cookie.split("=");
        if (key === name) return value;
    }
    return null;
}

function changeTheme() {
    const logo = document.getElementById('theme-logo');
    const path = window.location.pathname;

    document.body.classList.toggle('dark-theme');

    if (document.body.classList.contains('dark-theme')) {
        document.cookie = "theme=dark; path=/; max-age=31536000"; // 1 an
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/moon.png" : "../image/moon.png";
    } else {
        document.cookie = "theme=light; path=/; max-age=31536000"; // 1 an
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/sun.png" : "../image/sun.png";
    }
}
function changeThemeMain() {
    const logo = document.getElementById('theme-logo');
    const path = window.location.pathname;

    document.body.classList.toggle('dark-theme');

    if (document.body.classList.contains('dark-theme')) {
        document.cookie = "theme=dark; path=/; max-age=31536000"; // 1 an
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/moon.png" : "image/moon.png";
    } else {
        document.cookie = "theme=light; path=/; max-age=31536000"; // 1 an
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/sun.png" : "image/sun.png";
    }
}

window.onload = function () {
    const savedTheme = getCookie('theme');
    const logo = document.getElementById('theme-logo');
    const path = window.location.pathname;

    if (savedTheme === 'dark') {
        document.body.classList.add('dark-theme');
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/moon.png" : "../image/moon.png";
    } else {
        document.body.classList.remove('dark-theme');
        logo.src = (path === '/' || path.endsWith('index.php')) ? "image/sun.png" : "../image/sun.png";
    }
};



const plane = document.getElementById('jet-cursor');

let cursorX = window.innerWidth / 2;
let cursorY = window.innerHeight / 2;
let t = 0;
let prevAngle = 0;
let hasMouseMoved = false;

plane.style.display = 'none';


document.addEventListener('mousemove', (e) => {
    cursorX = e.clientX;
    cursorY = e.clientY;

    if (!hasMouseMoved) {
        hasMouseMoved = true;
        plane.style.display = 'block';
    }
});

function animateInfinity() {
    t += 0.03;
    const a = 60;

    if (!hasMouseMoved) {
        requestAnimationFrame(animateInfinity);
        return;
    }

    const x = (a * Math.sin(t)) / (1 + Math.pow(Math.cos(t), 2));
    const y = a * Math.sin(t) * Math.cos(t);

    const planeX = cursorX + x;
    const planeY = cursorY + y;

    const dx = (a * Math.cos(t) * (1 + Math.pow(Math.cos(t), 2)) - a * Math.sin(t) * (-2 * Math.cos(t) * Math.sin(t))) / Math.pow(1 + Math.pow(Math.cos(t), 2), 2);
    const dy = a * (Math.cos(t) * Math.cos(t) - Math.sin(t) * Math.sin(t));

    const angle = Math.atan2(dy, dx);

    let deltaAngle = angle - prevAngle;

    if (deltaAngle > Math.PI) deltaAngle -= 2 * Math.PI;
    if (deltaAngle < -Math.PI) deltaAngle += 2 * Math.PI;

    plane.style.left = `${planeX}px`;
    plane.style.top = `${planeY}px`;
    plane.style.transform = `translate(-50%, -50%) rotate(${prevAngle + deltaAngle}rad)`;

    prevAngle = prevAngle + deltaAngle;

    requestAnimationFrame(animateInfinity);
}

animateInfinity();





