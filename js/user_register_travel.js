function calculer() {
        
    let price_per_day = 1099;
    let compteur = 0;
    let hotelIndex = 0;;
    let loisirNumber = 0;
    let visiteNumber = 0;
    let relaxationNumber = 0;
    let numberPersons = 0;
    let numberNights = 0;
    let departure = 0;
    let returnDate = 0;
    let basePrice = 0;
    let loisir_option = 5036;
    let relaxation_option = 2019;
    let visite_option = 4099;
    console.log(inputs.length);
    for (let i = 0; i < inputs.length; i++){
        if (inputs[i].name == "prix"){
            basePrice = parseFloat(inputs[i].value);
        }
        if (inputs[i].value != "" && inputs[i].type != "hidden" && inputs[i].type != "submit"){
            
            if (inputs[i].type == "checkbox"){
                console.log(i);
                switch (inputs[i].name){
                    case "loisir[]":
                        if (inputs[i].checked){
                            loisirNumber++;
                        }
                        break;
                    case "visite[]":
                        if (inputs[i].checked){
                            visiteNumber++;
                        }  
                        break;
                    case "relaxation[]":
                        if (inputs[i].checked){
                            relaxationNumber++;
                        }
                        break;
                    default:
                        break;
                }
            } else if (inputs[i].type == "number"){
                compteur++;
                numberPersons = parseInt(inputs[i].value);
            } else if (inputs[i].type == "date"){
                compteur++;
                if (inputs[i].id == "departure"){
                    departure = new Date(inputs[i].value);
                } else if (inputs[i].id == "return"){
                    returnDate = new Date(inputs[i].value);
                }
            } 
        }
        
    }
    if (hotel.value != ""){
        compteur++;
        switch (hotel.value){
            case "5 étoiles":
                hotelIndex = 1;
                break;
            case "5 étoiles premium":
                hotelIndex = 2;
                break;
            case "5 étoiles Premium VIP":
                hotelIndex = 3;
                break;
            case "5 étoiles Premium VIP Deluxe":
                hotelIndex = 4;
                break;
            default:
                hotelIndex = 0;
                break;
        }

        
    } 
    
    
    if (departure >= returnDate){
        numberNights = 1;
        submitButton.style.display = "none";
    } else {
        numberNights = (returnDate - departure) / (1000 * 3600 * 24);
    }
    
    if (numberPersons < 1){
        submitButton.style.display = "none";
    } if (numberPersons == 0){
        numberPersons = 1;
    }
    if (numberNights < 1){
        alert("Le nombre de nuits doit être supérieur à 0");
        submitButton.style.display = "none";
    }

    console.log(basePrice);
    let calcul = 0;
    console.log(loisirNumber);
    console.log(visiteNumber);
    console.log(relaxationNumber);
    console.log(numberNights);
    console.log(compteur);
    console.log(hotelIndex);
    calcul = (basePrice + loisirNumber * loisir_option + visiteNumber * visite_option + relaxationNumber * relaxation_option + hotelIndex * price_per_day) * numberNights * numberPersons;
    let total = document.querySelector("input[name=prix_final]");
    total.value = calcul;
    if (compteur == 4 && loisirNumber > 0 && visiteNumber > 0 && relaxationNumber && hotelIndex != 0){
        submitButton.style.display = "block";
    } else {
        submitButton.style.display = "none";
    }
}



let inputs = document.querySelectorAll("input");
let hotel = document.querySelector("#hotel");
let submitButton = document.querySelector("button[type='submit']");
submitButton.style.display = "none";
for (let j = 0; j < inputs.length; j++){
    inputs[j].addEventListener("input", calculer); 
}
hotel.addEventListener("input", calculer);