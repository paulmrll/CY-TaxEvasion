document.addEventListener('DOMContentLoaded', () => {
const buttonModify = document.getElementById('button-modify');
const inputAll = document.querySelectorAll('input[type="text"]');
const originalValues = new Object();
buttonModify.disabled = true;



function registerOriginalValues() {
    for (let i = 0; i < inputAll.length; i++) {
        originalValues[inputAll[i].name] = inputAll[i].value;
        console.log(originalValues[inputAll[i].name]);
    }
}

function checkInputValues(){
    for (let i = 0; i < inputAll.length; i++){
        inputAll[i].addEventListener('input', function() {
            let number3 = 0;
            let number = inputAll.length;
            let number2 = 0;
            for (let j = 0; j < inputAll.length; j++) {
                
                if (inputAll[j].value === ""){
                    inputAll[j].style.border = "2px solid red";
                    number3++;
                    
                } else if (inputAll[j].value == originalValues[inputAll[j].name]) {
                    inputAll[j].style.border = "2px solid green";
                    number--;
                } else {
                    inputAll[j].style.border = "2px solid green";
                    number2++;
                }
            }
            if (number3 > 0 || number == 0) {
                buttonModify.disabled = true;
            } else {
                buttonModify.disabled = false;
            }
        });
    }
}

async function fetchUserData(){
        const form = document.getElementById("form-modifier");
        const formData = new FormData(form);
       
        try {
             const reponse = await fetch('../php/modification.php', {
                method: 'POST',
                body: formData
            });
            console.log("Erreur HTTP :", reponse.status);
            if (!reponse.ok) {
            console.log("Erreur HTTP :", reponse.status);
            return;
            }
        } catch (error){
            console.error('Error fetching user data:', error);
        }

    }
    registerOriginalValues();
    for (let i = 0; i < inputAll.length; i++){
        inputAll[i].addEventListener('input', () => {
            
            checkInputValues();
            
            
    });
}
    

    buttonModify.addEventListener('click', fetchUserData);
});