let see = document.querySelectorAll(".modif-image");
let inputAll = document.querySelectorAll("input")
for (let i = 0; i < inputAll.length; i++) {
    inputAll[i].readOnly = true;
    inputAll[i].style.backgroundColor = "grey";
    inputAll[i].style.color = "white";
}


for (let i = 0; i < see.length; i++) {
    see[i].addEventListener('click', function() {
        let parentDiv = this.closest('div');
        let input = parentDiv.querySelector('input');
        if (input.readOnly == true) {
            input.readOnly = false;
            input.style.backgroundColor = "white";
            input.style.color = "black";
            see[i].src = "../image/no-visibility.png";
        } else if (input.readOnly == false) {
            input.readOnly = true;
            input.style.backgroundColor = "grey";
            input.style.color = "white";
            see[i].src = "../image/visibility-logo.png";
        }
    });
}