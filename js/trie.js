let select = document.querySelectorAll("select");
let select_hotel = 0;
let select_continent = 0;
let select_prix = 0;

for (let j = 0; j < select.length; j++){
    select[j].addEventListener("change", function(){
        for (let i = 0; i < select.length; i++){
            switch (select[i].id){
                case "select-hotel":
                    if (select[i].value == ""){
                        select_hotel = 0;
                    } else {
                        select_hotel = select[i].value;
                    }
                    break;
                case "select-prix":
                    if (select[i].value == ""){
                        select_prix = 0;
                    } else {
                        select_prix = select[i].value;
                    }
                    break;
                case "select-continent":
                    if (select[i].value == ""){
                        select_continent = 0;
                    } else {
                        select_continent = select[i].value;
                    }
                    break;
                default:
                    break
            }
        }
        let destinationdiv = document.querySelectorAll("div.grid-item");
        let compteur = 0;
        for (let i = 0; i < destinationdiv.length; i++){
            let prix = destinationdiv[i].dataset.price;
            prix = parseInt(prix);
            let hotel = destinationdiv[i].dataset.hotel;
            if (hotel == ""){
                hotel = [];
            } else {
                hotel = hotel.split(",");
            }
            
            let continent = destinationdiv[i].dataset.continent;
            let a = destinationdiv[i].closest("a");
            if (!hotel.includes(select_hotel) && select_hotel != 0){
                compteur++;
                a.style.display = "none";
            } else if (continent != select_continent && select_continent != 0){
                compteur++;
                a.style.display = "none";
            } else if (select_prix != 0){
                a.style.display = "flex";
                switch (select_prix){
                    case "-10000":
                        if (prix > 10000){
                            compteur++;
                            a.style.display = "none";
                        }
                        break;
                    case "10000-20000":
                        if (prix < 10000 || prix > 20000){
                            compteur++;
                            a.style.display = "none";
                        }
                        break;
                    case "+20000":
                        if (prix < 20000){
                            compteur++;
                            a.style.display = "none";
                        }
                        break;
                    case 0 :
                        a.style.display = "flex";
                        break;
                    default :
                        break;
                }
            } else {
                a.style.display = "flex";
            }
        }
    });
}
