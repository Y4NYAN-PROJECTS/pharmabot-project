document.addEventListener('DOMContentLoaded', function () {
    var usertype = document.getElementsByName('user_type');
    var title = document.getElementById('title');

    usertype.forEach(function (radio) {
        if (radio.checked) {
            title.textContent = radio.value;
        }

        radio.addEventListener('change', function () {
            if (this.checked) {
                title.textContent = this.value;
            }
        });
    });
});