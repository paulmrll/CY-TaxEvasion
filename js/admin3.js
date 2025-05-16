document.addEventListener('DOMContentLoaded', () => {
    const buttonModify = document.getElementById('button-modify');
    const inputAll = document.querySelectorAll('input[type="text"]');
    const originalValues = new Object();

    const buttonReturn = document.getElementById('button-return');
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[type="text"]');
    const select = document.getElementById('role-select');
    const roleSelect = document.getElementById('role-select');
    const roleHidden = document.getElementById('role-hidden');



    buttonModify.disabled = true;



    function registerOriginalValues() {
        for (let i = 0; i < inputAll.length; i++) {
            originalValues[inputAll[i].name] = inputAll[i].value;
            console.log(originalValues[inputAll[i].name]);
        }
    }

    function checkInputValues(){
        console.log("checkInputValues");
        for (let i = 0; i < inputAll.length; i++){
            let number3 = 0;
            let number = inputAll.length;
            let number2 = 0;
            for (let j = 0; j < inputAll.length; j++) {

                if (inputAll[j].value === ""){
                    inputAll[j].style.border = "2px solid red";
                    console.log("Valeur vide");
                    number3++;

                } else if (inputAll[j].value == originalValues[inputAll[j].name]) {
                    inputAll[j].style.border = "2px solid green";
                    console.log("Valeur inchangée");
                    console.log("number" + number);
                    number--;
                } else {
                    inputAll[j].style.border = "2px solid green";
                    console.log("Valeur modifiée");
                    number2++;
                }

            }
            if (number3 > 0 || number == 0) {
                buttonModify.disabled = true;
            } else {
                buttonModify.disabled = false;
            }
        }
    }

    async function fetchUserData(){
        const form = document.getElementById("form-modifier");
        const formData = new FormData(form);


        inputs.forEach(input => {
            input.disabled = true;
            input.placeholder = '...';
        });

        buttonModify.disabled = true;
        buttonReturn.disabled = true;
        select.disabled = true;

        let dotCount = 0;
        const originalText = 'Mise à jour';
        buttonModify.textContent = originalText;

        const interval = setInterval(() => {
            dotCount = (dotCount + 1) % 4;
            buttonModify.textContent = originalText + '.'.repeat(dotCount);
        }, 200);


        setTimeout(() => {
            clearInterval(interval);

            inputs.forEach((input, index) => {
                input.disabled = false;
            });

            buttonModify.textContent = 'Modifier';
            buttonModify.disabled = false;
            buttonReturn.disabled = false;


        }, 2000);


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