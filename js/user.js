

const registerData = new Object();
registerData.name = document.querySelector("input[name='name']").value;
registerData.surname = document.querySelector("input[name='firstname']").value;
registerData.email = document.querySelector("input[name='email']").value;
registerData.password = document.querySelector("input[name='password']").value;
registerData.nb = document.querySelector("input[name='nb']").value;
registerData.road = document.querySelector("input[name='rue']").value;
registerData.city = document.querySelector("input[name='ville']").value;
registerData.postalCode = document.querySelector("input[name='cdp']").value;
registerData.birth = document.querySelector("input[name='birth']").value;

let reload = document.querySelector(".reload-image");


let see = document.querySelectorAll(".modif-image");
    let inputAll = document.querySelectorAll("input");
    console.log(registerData.name);
    for (let i = 0; i < inputAll.length; i++) {
        inputAll[i].readOnly = true;
        inputAll[i].style.backgroundColor = "grey";
        inputAll[i].style.color = "white";
    }
    let button = document.querySelector(".button-modifier");
    button.style.display = "none";

reload.addEventListener('click', function() {
    for (let i = 0; i < inputAll.length; i++) {
        if (inputAll[i].name == "password") {
            inputAll[i].value = registerData.password;
        } else if (inputAll[i].name == "name") {
            inputAll[i].value = registerData.name;
        }
        else if (inputAll[i].name == "firstname") {
            inputAll[i].value = registerData.surname;
        } else if (inputAll[i].name == "email") {
            inputAll[i].value = registerData.email;
        } else if (inputAll[i].name == "nb") {
            inputAll[i].value = registerData.nb;
        } else if (inputAll[i].name == "rue") {
            inputAll[i].value = registerData.road;
        } else if (inputAll[i].name == "ville") {
            inputAll[i].value = registerData.city;
        } else if (inputAll[i].name == "cdp") {
            inputAll[i].value = registerData.postalCode;
        } else if (inputAll[i].name == "birth") {
            inputAll[i].value = registerData.birth;
        } else {
            inputAll[i].value = "";
        }

        let parentDiv = inputAll[i].closest('div');
        let image = parentDiv.querySelector('img');
        if (inputAll[i].readOnly == false) {
            if (inputAll[i].name == "password") {
                inputAll[i].type = "password";
            }
            inputAll[i].readOnly = true;
            inputAll[i].style.backgroundColor = "grey";
            inputAll[i].style.color = "white";
            image.src = "../image/visibility-logo.png";
        }
    }
});



for (let i = 0; i < see.length; i++) {
    see[i].addEventListener('click', function() {
        let parentDiv = this.closest('div');
        let input = parentDiv.querySelector('input');
        if (input.readOnly == true) {
            if (input.name == "password") {
                input.type = "text";
            }
            input.readOnly = false;
            input.style.backgroundColor = "white";
            input.style.color = "black";
            see[i].src = "../image/validation.png";
        } else if (input.readOnly == false) {
            if (input.name == "password") {
                input.type = "password";
            }
            input.readOnly = true;
            input.style.backgroundColor = "grey";
            input.style.color = "white";
            see[i].src = "../image/visibility-logo.png";
        }
    });
}

let inputAll2 = document.querySelectorAll("input");
for (let i = 0; i < inputAll2.length; i++){
    inputAll2[i].addEventListener('input', function() {
        button.style.display = "flex";
        button.style.justifyContent = "center";
    });
}