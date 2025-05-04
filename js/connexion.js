let inputs = document.querySelectorAll("input");
let button = document.querySelector("button[type='submit']");
button.disabled = true;
let number = 0;
for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("input", function() {
    number = 0;
    for (let j = 0; j < inputs.length; j++) {

        if (inputs[j].value === "") {
            inputs[j].style.border = "2px solid red";
            number = 0;
        } else {
            if (inputs[j].type === "email") {
                if (inputs[j].value.includes("@") && inputs[j].value.includes(".")) {
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
        if (number == inputs.length) {
            button.disabled = false;
        } else {
            button.disabled = true;
        }
    }
    });
}
let reset = document.querySelector("button[type=reset]");
reset.addEventListener("click", function() {
    for (let i = 0; i < inputs.length; i++){
        inputs[i].style.border = "2px solid red";
    }
    button.disabled = true;
});  
