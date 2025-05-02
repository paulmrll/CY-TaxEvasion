

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
        inputAll[i].style.border = "1px solid black";
        

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
        let button = document.querySelector(".button-modifier");
    button.style.display = "none";
    }
});


let inputAll2 = document.querySelectorAll("input");

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



for (let i = 0; i < inputAll2.length; i++) {
    inputAll2[i].addEventListener('input', function() {
        let number3 = 0;
        let number = 0;
        let number2 = 0;
        for (let j = 0; j < inputAll2.length; j++) {
            if (inputAll2[j].value === ""){
                border = "2px solid red";
                inputAll2[j].style.border = border;
                number2--;
            } else {
                if (inputAll2[j].type == "email"){
                    if (inputAll2[j].value == registerData.email){
                        inputAll2[j].style.border = "2px solid green";
                        number3++;
                    } else  if (inputAll2[j].value.includes("@") && inputAll2[j].value.includes(".")){
                        inputAll2[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputAll2[j].style.border = "2px solid red";
                        number2--;
                    }
                } else if (inputAll2[j].name == "birth"){
                    let date  = new Date(inputAll2[j].value);
                    let today = new Date();
                    if (inputAll2[j].value == registerData.birth){
                        inputAll2[j].style.border = "2px solid green";
                        number3++;
                    } else if (today <= date){
                        inputAll2[j].style.border = "2px solid red";
                        number2--;
                    } else {
                        inputAll2[j].style.border = "2px solid green";
                        number++;
                    }
                } else if (inputAll2[j].name == "cdp"){
                    if (inputAll2[j].value == registerData.postalCode){
                        inputAll2[j].style.border = "2px solid green";
                        number3++;
                    } else if (inputAll2[j].value.length == 5 && !isNaN(inputAll2[j].value)){
                        inputAll2[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputAll2[j].style.border = "2px solid red";
                        number2--;
                    }
                } else if (inputAll2[j].name == "nb"){
                    if (inputAll2[j].value == registerData.nb){
                        inputAll2[j].style.border = "2px solid green";
                        number3++;
                    } else if (inputAll2[j].value > 0 && !isNaN(inputAll2[j].value)){
                        inputAll2[j].style.border = "2px solid green";
                        number++;
                    } else  {
                        inputAll2[j].style.border = "2px solid red";
                        number2--;
                    }
                } else {
                    if (inputAll2[j].value == registerData.name || inputAll2[j].value == registerData.surname || inputAll2[j].value == registerData.road || inputAll2[j].value == registerData.city || inputAll2[j].value == registerData.password){
                        inputAll2[j].style.border = "2px solid green";
                        number3++;
                    } else if (inputAll2[j].value.length > 0){
                        inputAll2[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputAll2[j].style.border = "2px solid red";
                        number2--;
                    }
                }
            }
        }
        console.log(number3);
        console.log(inputAll2.length);
        if (number > 0 && number2 == 0 && number3 && number3 != inputAll2.length -2){
            button.style.display = "block";
            button.style.margin = "auto";
        } else {
            button.style.display = "none";
        }

    });
}