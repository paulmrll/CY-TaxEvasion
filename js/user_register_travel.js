function minimumDate() {
    let inputDate = document.getElementById("departure");
    let returnDate = document.getElementById("return");
    returnDate.min = inputDate.value;

    
}
function maximumDate() {
    let inputDate = document.getElementById("departure");
    let returnDate = document.getElementById("return");
    inputDate.max = returnDate.value;
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

async function checkBox() {
    let hotel = document.querySelectorAll("input[type='checkbox']");
    let checkBox_visite = document.querySelectorAll("input[name='visite[]']");
    let checkBox_relaxation = document.querySelectorAll("input[name='relaxation[]']");
    let checkBox_loisir = document.querySelectorAll("input[name='loisir[]']");
    let destination = document.querySelector("#destination").value;
    console.log(destination);
    try{
        const response = await fetch(`../php/give_checkbox.php?destination=${encodeURIComponent(destination)}`);
        console.log(response.status);
        if (!response.ok) {
            console.log("Erreur HTTP :", response.status);
            return;
        }
        
        const data = await response.json();
        
    for (let i = 0; i < data.visite.length; i++){
        let visite = document.createElement("input");
        visite.type = "checkbox";
        visite.name = "visite[]";
        visite.value = data.visite[i];
        visite.id = "visite"+ i;
        let label = document.createElement("label");
        label.setAttribute("for", visite.id);
        label.innerHTML = data.visite[i];
        label.classList.add("reservation-button");
        document.querySelector("#visite_div").appendChild(visite);
        document.querySelector("#visite_div").appendChild(label);
        document.querySelector("#visite_div").appendChild(document.createElement("br"));
    }
    for (let i = 0; i < data.relaxation.length; i++){
        let relaxation = document.createElement("input");
        relaxation.type = "checkbox";
        relaxation.name = "relaxation[]";
        relaxation.value = data.relaxation[i];
        relaxation.id = "relaxation"+ i;
        let label = document.createElement("label");
        label.setAttribute("for", relaxation.id);
        label.innerHTML = data.relaxation[i];
        label.classList.add("reservation-button");
        document.querySelector("#relaxation_div").appendChild(relaxation);
        document.querySelector("#relaxation_div").appendChild(label);
        document.querySelector("#relaxation_div").appendChild(document.createElement("br"));

    }
    for (let i = 0; i < data.loisir.length; i++){
        let loisir = document.createElement("input");
        loisir.type = "checkbox";
        loisir.name = "loisir[]";
        loisir.value = data.loisir[i];
        loisir.id = "loisir"+ i;
        let label = document.createElement("label");
        label.setAttribute("for", loisir.id);
        label.innerHTML = data.loisir[i];
        label.classList.add("reservation-button");
        document.querySelector("#loisir_div").appendChild(loisir);
        document.querySelector("#loisir_div").appendChild(label);
        document.querySelector("#loisir_div").appendChild(document.createElement("br"));
    }
    const selectHotel = document.querySelector("#hotel");
    selectHotel.innerHTML = `<option value="" selected hidden>Choisissez une option</option>`;

    for (let i = 0; i < data.hotel.length; i++) {
        let option = document.createElement("option");
        option.value = data.hotel[i];
        option.innerHTML = data.hotel[i];
        selectHotel.appendChild(option);
    }
    const inputs = document.querySelectorAll("input");
    for (let j = 0; j < inputs.length; j++) {
        inputs[j].addEventListener("input", () => {
            price();
            validateForm();
        });
    }
    } catch(e){
        console.log("Erreur HTTP :", e.message);
    }
    
}

window.addEventListener("DOMContentLoaded", () => {
    
    checkBox();

    let hotel = document.querySelector("#hotel");
    let submitButton = document.querySelector("button[type='submit']");
    submitButton.disabled = true;
    minimumDate();
    maximumDate();
    document.getElementById("departure").addEventListener("change", minimumDate);
    document.getElementById("return").addEventListener("change", maximumDate);
    hotel.addEventListener("change", () => {
        price();
        validateForm();
    });
    

});
