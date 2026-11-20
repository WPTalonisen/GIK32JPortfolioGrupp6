// JS-krokar: data-js-action, data-*, data-js-target. Kod är frivillig.


//menu
const toggleMenu = document.querySelector('[data-js-action="toggle-menu"]')
const menu = document.querySelector('[data-js-target="menu"]')

if (toggleMenu && menu){
    toggleMenu.addEventListener('click',function (){
        const isOpen= menu.classList.toggle('is-open');
        toggleMenu.setAttribute('aria-expanded',isOpen);
    });

    // Escape stänger menyn och flyttar fokus tillbaka till knappen
    document.addEventListener('keydown',function (event){
        if (event.key === 'Escape' && menu.classList.contains('is-open')){
            menu.classList.remove('is-open');
            toggleMenu.setAttribute('aria-expanded','false');
            toggleMenu.focus();
        }
    });
}
//end of menu

//kontakt
const  copyButton = document.querySelector('[data-js-action="copy-email"]')
const copyStatus = document.querySelector('[data-js-target="copy-status"]')
if(copyButton && copyStatus){
    copyButton.addEventListener('click',function (){
        const email = copyButton.getAttribute('data-email');
        navigator.clipboard.writeText(email).then(function (){
            copyStatus.textContent = "E-postadressen är kopierad";
        });
    });
}
const countCharacters = document.querySelector('[data-js-action="count-characters"]')
const characterCount = document.querySelector('[data-js-target="character-count"]')
if (countCharacters && characterCount){
    const maxLength = countCharacters.getAttribute('data-max-length')|| 1000;

    countCharacters.addEventListener('input',function (){
        const currentLength = countCharacters.value.length;
        characterCount.textContent=`${currentLength} av ${maxLength} tecken använda`;
    });
}
//end of kontakt
