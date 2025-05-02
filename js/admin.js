document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.button-modifier');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const form = button.closest('form');
            const inputs = form.querySelectorAll('input[type="text"]');
            const retourButton = document.getElementById('button-retour');
            const originalValues = [];

            inputs.forEach(input => {
                originalValues.push(input.value);
                input.value = '';
                input.placeholder = '...';
                input.disabled = true;
            });

            button.disabled = true;
            if (retourButton) retourButton.disabled = true;

            let dotCount = 0;
            const originalText = 'Mise à jour';
            button.textContent = originalText;

            const interval = setInterval(() => {
                dotCount = (dotCount + 1) % 4;
                button.textContent = originalText + '.'.repeat(dotCount);
            }, 200);



            setTimeout(() => {
                clearInterval(interval);
                inputs.forEach((input, index) => {
                    input.value = originalValues[index];
                    input.disabled = false;
                });

                if (retourButton) retourButton.disabled = false;

                button.textContent = 'Modifier';
                button.disabled = false;

                form.submit();
            }, 3000);
        });
    });
});
