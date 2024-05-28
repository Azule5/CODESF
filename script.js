document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('.menu > ul > li');

    menuItems.forEach(item => {
        const submenu = item.querySelector('.submenu');

        if (submenu) {
            // Oculta o submenu por padrão
            submenu.style.display = 'none';

            // Exibe o submenu ao passar o mouse sobre o item do menu
            item.addEventListener('mouseenter', () => {
                submenu.style.display = 'block';
            });

            // Oculta o submenu ao tirar o mouse do item do menu
            item.addEventListener('mouseleave', () => {
                submenu.style.display = 'none';
            });
        }
    });
});



//Slideshow
let slideIndex = 1;
let timer; // Variável para armazenar o temporizador do slideshow

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    timer = setTimeout(showSlides, 10000); // Altera a imagem a cada 10 segundos (10000 milissegundos)
}

function plusSlides(n) {
    clearTimeout(timer); // Limpa o temporizador ao navegar manualmente
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    clearTimeout(timer); // Limpa o temporizador ao navegar manualmente
    showSlides(slideIndex = n);
}

showSlides();

//Fim do Slideshow

//TESTANDO

function toggleAccordion(element) {
    const body = element.nextElementSibling;
    body.classList.toggle('activeAccordion');
}


// Função para abrir/fechar os submenus
document.querySelectorAll('.has-submenu > a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault(); // Evita que o link seja seguido
        const submenu = item.parentElement.querySelector('.submenu');

        // Verifica se o submenu está visível e fecha todos os submenus
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
        } else {
            // Fecha todos os submenus antes de abrir o submenu clicado
            document.querySelectorAll('.submenu').forEach(sub => {
                sub.style.display = 'none';
            });
            submenu.style.display = 'block';
        }
    });
});

// Função para abrir/fechar o menu no mobile ao clicar no ícone de hambúrguer
document.getElementById('hamburger').addEventListener('click', function() {
    var menu = document.getElementById('menu');
    var closeMenu = document.getElementById('close-menu');
    menu.classList.toggle('show');
    closeMenu.classList.toggle('show');
});

// Função para fechar o menu no mobile ao clicar no botão de fechar
document.getElementById('close-menu').addEventListener('click', function() {
    var menu = document.getElementById('menu');
    var closeMenu = document.getElementById('close-menu');
    menu.classList.toggle('show');
    closeMenu.classList.toggle('show');
});