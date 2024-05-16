var inputList = document.querySelectorAll('input');

inputList.forEach(input => {
    input.addEventListener('focus', function(event) {
        event.preventDefault();

        event.target.classList.add('selected');
    });

    input.addEventListener('blur', function(event) {
        event.preventDefault();

        event.target.classList.remove('selected');
    });
});