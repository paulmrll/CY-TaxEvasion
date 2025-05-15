function minimumDate() {
    let inputDate = document.getElementById("departure");
    let returnDate = document.getElementById("return");
    console.log( inputDate.value);
        returnDate.min = inputDate.value;

    
}




async function price(){
    const price = document.querySelector("#prix_final");
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
let inputs = document.querySelectorAll("input");
let hotel = document.querySelector("#hotel");
let submitButton = document.querySelector("button[type='submit']");
submitButton.disabled = false;
for (let j = 0; j < inputs.length; j++) {
    inputs[j].addEventListener("input", ()=>{
        price();

    });
}
hotel.addEventListener("change", () => {
    price();
}
);


window.addEventListener("DOMContentLoaded", () => {
    minimumDate();
    document.getElementById("departure").addEventListener("change", minimumDate);
});
