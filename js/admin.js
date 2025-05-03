document.addEventListener('DOMContentLoaded', () => {

    const buttonModify = document.getElementById('button-modify');
    const buttonReturn = document.getElementById('button-return');
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[type="text"]');
    const originalValues = Array.from(inputs).map(input => input.value);
    const select = document.getElementById('role-select');

    const roleSelect = document.getElementById('role-select');
    const roleHidden = document.getElementById('role-hidden');


    roleSelect.addEventListener('change', () => {
        roleHidden.value = roleSelect.value;
    });

    roleHidden.value = roleSelect.value;




    buttonModify.disabled = true;


    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            const isChanged = Array.from(inputs).some((input, i) => input.value !== originalValues[i]);
            buttonModify.disabled = !isChanged;
        });
    });

    select.addEventListener('change', () =>{

        buttonModify.disabled = false;
    });


    buttonModify.addEventListener('click', () => {

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

            form.submit();
        }, 2000);
    });
});