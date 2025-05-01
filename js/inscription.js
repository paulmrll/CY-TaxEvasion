let inputs = document.querySelectorAll("input");
let button = document.querySelector("button[type='submit']");
button.style.display = "none";
let number = 0; 
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("input", function() {
        number = 0;
        for (let j = 0; j < inputs.length; j++){
            if (inputs[j]. value === ""){
                number = 0;
                inputs[j].style.border = "2px solid red";
            } else {
                if (inputs[j].type == "email"){
                    if (inputs[j].value.includes("@") && inputs[j].value.includes(".")){
                        inputs[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputs[j].style.border = "2px solid red";
                        number = 0;
                    }
                } else if (inputs[j].name == "birth"){
                    let date  = new Date(inputs[j].value);
                    let today = new Date();
                    if (today <= date){
                        inputs[j].style.border = "2px solid red";
                        number = 0;
                    } else {
                        inputs[j].style.border = "2px solid green";
                        number++;
                    }
                } else if (inputs[j].name == "cdp"){
                    if (inputs[j].value.length == 5 && !isNaN(inputs[j].value)){
                        inputs[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputs[j].style.border = "2px solid red";
                        number = 0;
                    }
                } else if (inputs[j].name == "numero"){
                    if (inputs[j].value > 0 && !isNaN(inputs[j].value)){
                        inputs[j].style.border = "2px solid green";
                        number++;
                    } else {
                        inputs[j].style.border = "2px solid red";
                        number = 0;
                    }
                } else {
                    inputs[j].style.border = "2px solid green";
                    number++;
                }
            }
        }
        if (number == inputs.length){
            button.style.display = "block";
            button.style.margin = "auto";
        } else {
            button.style.display = "none";
        }
    });
}

let reset = document.querySelector("button[type=reset]");
reset.addEventListener("click", function() {
    for (let i = 0; i < inputs.length; i++){
        inputs[i].style.border = "2px solid red";
    }
    button.style.display = "none";
});