let inputs = document.querySelectorAll("input");
let button = document.querySelector("button[type=submit]");
button.disabled = true;
for (let j = 0; j < inputs.length; j++){
    inputs[j].addEventListener("input", function(){
        let number = 0;
        let number_loisir = 0;
        let number_relaxation = 0;
        let number_visite = 0;
        let number_hotel = 0;
        let number_files = 3;
        for (let i = 0; i < inputs.length; i++){
            if (inputs[i].type != "hidden"){
                if (inputs[i].value == ""){
                    number++;
                } else {
                    if (inputs[i].type == "checkbox"){
                        switch (inputs[i].name){
                            case "loisir[]" :
                                if (inputs[i].checked){
                                    number_loisir++;
                                }
                                break;
                            case "visite[]" :
                                if (inputs[i].checked){
                                    number_visite++;
                                }
                                break;
                            case "relaxation[]" :
                                if (inputs[i].checked){
                                    number_relaxation++;
                                }
                                break;
                            case "hotel[]" :
                                if (inputs[i].checked){
                                    number_hotel++;
                                }
                                break;
                            case defaut : 
                                break;
                        }
                        } else if (inputs[i].type == "file"){
                            if (inputs[i].files.length > 0){
                                number_files--;
                            }
                        } else if (inputs[i].name == "prix"){
                            if (inputs[i].value <= 0 || isNaN(inputs[i].value)){
                                number++;
                            }
                        }
                    }
                }
            }
            if(number != 0 || number_files != 0 || number_loisir == 0 || number_visite == 0 || number_relaxation == 0){
                button.disabled = true;
            } else {
                button.disabled = false;
            }
    });
}