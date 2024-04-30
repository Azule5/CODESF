window.Joomla = window.Joomla || {};

(function(window, Joomla) {
    Joomla.toggleField = function(id, task, field) {

        var f = document.adminForm,
            i = 0,
            cbx, cb = f[id];

        if (!cb) return false;

        while (true) {
            cbx = f['cb' + i];

            if (!cbx) break;

            cbx.checked = false;
            i++;
        }

        var inputField = document.createElement('input');

        inputField.type = 'hidden';
        inputField.name = 'field';
        inputField.value = field;
        f.appendChild(inputField);

        cb.checked = true;
        f.boxchecked.value = 1;
        Joomla.submitform(task);

        return false;
    };
})(window, Joomla);



//

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function nextSlide() {
    if (currentIndex < totalItems - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    updateSlide();
}

function prevSlide() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = totalItems - 1;
    }
    updateSlide();
}

function updateSlide() {
    const itemWidth = items[currentIndex].clientWidth;
    const newPosition = -itemWidth * currentIndex;
    document.querySelector('.carousel-container').style.transform = `translateX(${newPosition}px)`;
}