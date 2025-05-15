function minimumDate() {
    let inputDate = document.getElementById("departure");
    let returnDate = document.getElementById("return");
    console.log( inputDate.value);
        returnDate.min = inputDate.value;

    
}

function validateForm() {
    let inputs = document.querySelectorAll("input");
    let hotel = document.querySelector("#hotel");
    let submitButton = document.querySelector("button[type='submit']");
    submitButton.disabled = true;
    let numberOfChecked1 = 0;
    let numberOfChecked2 = 0;
    let numberOfChecked3 = 0;
    let number4 = 0;
    let number5 = 0;
    let number6 = 0;
    for (let i = 0; i < inputs.length; i++){
        if (inputs[i].value === ""){
            number5++;
        } else {
            if (inputs[i].type === "checkbox" ) {
                switch (inputs[i].name) {
                    case "visite[]":
                        if (inputs[i].checked) {
                            numberOfChecked1++;
                        }
                        break;
                    case "relaxation[]":
                        if (inputs[i].checked) {
                            numberOfChecked2++;
                        }
                        break;
                    case "loisir[]":
                        if (inputs[i].checked) {
                            numberOfChecked3++;
                        }
                        break;
                }
            } else if (inputs[i].type === "number") {
                if (inputs[i].value <= 0) {
                    number4++;
                }
            }
        }
        if (hotel.value === ""){
            number6++;
        }
        if (numberOfChecked1 == 0 || numberOfChecked2 == 0 || numberOfChecked3 == 0 || number4 > 0 || number5 > 0 || number6 > 0) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }

    }
}




async function price(){
    const form = document.getElementById("form1");
    const formData = new FormData(form);
    const prix = document.querySelector("#prix_final");
    
    formData.set("todo", "calculer");
    try {
        const response = await fetch("../php/register_travel.php", {
            method: "POST",
            body: formData,
        });
        if (!response.ok) {
            console.log("Erreur HTTP :", response.status);
            return;
        }
        const data = await response.text();
        prix.innerHTML = data;
    }
    catch (e) {
        console.log("Erreur HTTP :", response.status);
    }
}






window.addEventListener("DOMContentLoaded", () => {
    let inputs = document.querySelectorAll("input");
    let hotel = document.querySelector("#hotel");
    let submitButton = document.querySelector("button[type='submit']");
    submitButton.disabled = true;
    minimumDate();
    document.getElementById("departure").addEventListener("change", minimumDate);
    hotel.addEventListener("change", () => {
        price();
        validateForm();
    });
    for (let j = 0; j < inputs.length; j++) {
    inputs[j].addEventListener("input", ()=>{
        price();
        validateForm();

    });
}
});
