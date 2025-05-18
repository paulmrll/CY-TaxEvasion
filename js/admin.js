document.addEventListener('DOMContentLoaded', () => {
    const buttonModify = document.getElementById('button-modify');
    const inputAll = document.querySelectorAll('input[type="text"]');
    const originalValues = {};
    const buttonReturn = document.getElementById('button-return');
    const form = document.getElementById('form-modifier');
    const inputs = form.querySelectorAll('input[type="text"]');
    const roleSelect = document.getElementById('role-select');
    const roleHidden = document.getElementById('role-hidden');

    buttonModify.disabled = true;

    function registerOriginalValues() {
        inputAll.forEach(input => {
            originalValues[input.name] = input.value;
        });
        originalValues['role'] = roleSelect.value;
    }

    function checkInputValues() {
        let hasEmpty = false;
        let hasChanged = false;
        let roleChanged = false;

        inputAll.forEach(input => {
            if (input.value.trim() === '') {
                input.style.border = "2px solid red";
                hasEmpty = true;
            } else {
                input.style.border = "2px solid green";
                if (input.value !== originalValues[input.name]) {
                    hasChanged = true;
                }
            }
        });

        if (roleSelect.value !== originalValues['role']) {
            roleChanged = true;
        }

        buttonModify.disabled = hasEmpty || !(hasChanged || roleChanged);
    }

    roleSelect.addEventListener('change', checkInputValues);



    inputAll.forEach(input => {
        input.addEventListener('input', checkInputValues);
    });


    async function fetchUserData() {

        roleHidden.value = roleSelect.value;

        const formData = new FormData(form);

        inputs.forEach(input => {
            input.disabled = true;
            input.placeholder = '...';
        });

        buttonModify.disabled = true;
        buttonReturn.disabled = true;
        roleSelect.disabled = true;

        let dotCount = 0;
        const originalText = 'Mise à jour';
        buttonModify.textContent = originalText;
        roleHidden.value = roleSelect.value;


        const interval = setInterval(() => {
            dotCount = (dotCount + 1) % 4;
            buttonModify.textContent = originalText + '.'.repeat(dotCount);
        }, 200);

        setTimeout(() => {
            clearInterval(interval);

            inputs.forEach(input => input.disabled = false);
            roleSelect.disabled = false;
            buttonModify.textContent = 'Modifier';
            buttonModify.disabled = false;
            buttonReturn.disabled = false;
            roleSelect.disabled = false;

            inputAll.forEach(input => {
                originalValues[input.name] = input.value;
            });
            originalValues['role'] = roleSelect.value;

            checkInputValues();


        }, 2000);

        try {
            const response = await fetch('../php/modification.php', {
                method: 'POST',
                body: formData
            });
            if (!response.ok) {
                console.log("Erreur HTTP :", response.status);
                return;
            }
        } catch (error) {
            console.error('Erreur réseau :', error);
        }
    }

    registerOriginalValues();

    buttonModify.addEventListener('click', fetchUserData);

    buttonReturn.addEventListener('click', () => {
        window.location.href = '../php_pages/admin.php';
    });
});
