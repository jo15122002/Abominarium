// selected necessary dom elements

const domElements = {
    buttonA: document.querySelectorAll('.buttons__button')[1],
    buttonB: document.querySelectorAll('.buttons__button')[0],
    dPadTop: document.querySelector('.d-pad__cell.top'),
    dPadLeft: document.querySelector('.d-pad__cell.left'),
    dPadRight: document.querySelector('.d-pad__cell.right'),
    dPadBottom: document.querySelector('.d-pad__cell.bottom'),
    dPadMiddle: document.querySelector('.d-pad__cell.middle')
}

// add event listener for keydown and keyup
document.addEventListener('keydown', (event) => {
    console.log(event.key);
    switch (event.key) {
        case 'ArrowUp':
            domElements.dPadTop.classList.add('active');
            break;
        case 'ArrowLeft':
            domElements.dPadLeft.classList.add('active');
            break;
        case 'ArrowRight':
            domElements.dPadRight.classList.add('active');
            break;
        case 'ArrowDown':
            domElements.dPadBottom.classList.add('active');
            break;
        case 'b':
        case 'B':
            domElements.buttonB.classList.add('active');
            break;
        case 'a':
        case 'A':
            domElements.buttonA.classList.add('active');
            break;
    }
});
document.addEventListener('keyup', (event) => {
    switch (event.key) {
        case 'ArrowUp':
            domElements.dPadTop.classList.remove('active');
            break;
        case 'ArrowLeft':
            domElements.dPadLeft.classList.remove('active');
            break;
        case 'ArrowRight':
            domElements.dPadRight.classList.remove('active');
            break;
        case 'ArrowDown':
            domElements.dPadBottom.classList.remove('active');
            break;
        case 'b':
        case 'B':
            domElements.buttonB.classList.remove('active');
            break;
        case 'a':
        case 'A':
            domElements.buttonA.classList.remove('active');
            break;
    }
});

// foreach on domElements
Object.keys(domElements).forEach((key) => {
    // add event listener for mouse down and mouse up
    domElements[key].addEventListener('mousedown', () => {
        domElements[key].classList.add('active');
    });
    domElements[key].addEventListener('mouseup', () => {
        domElements[key].classList.remove('active');
    });
    // add event listener for touch start and touch end
    domElements[key].addEventListener('touchstart', () => {
        domElements[key].classList.add('active');
    });
    domElements[key].addEventListener('touchend', () => {
        domElements[key].classList.remove('active');
    });
});

// KONAMI CODE

let konamiCodeNum = 0;
let konamiTimeOut = null;
const konamiTimeoutDelay = 1000;
const KONAMI_CODE = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a', ' '];
document.addEventListener('keydown', (event) => {
    if (konamiTimeOut !== null) clearTimeout(konamiTimeOut);
    konamiTimeOut = setTimeout(() => { konamiCodeNum = 0, konamiTimeOut = null; }, konamiTimeoutDelay);
    if (event.key === KONAMI_CODE[konamiCodeNum])  konamiCodeNum++;
    else konamiCodeNum = 0;
    if (konamiCodeNum === KONAMI_CODE.length) {
        alert('Code Konami activé!');
        konamiCodeNum = 0;
    }
});

