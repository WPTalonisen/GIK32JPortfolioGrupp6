// JS-krokar: data-js-action, data-*, data-js-target. Kod är frivillig.


//menu
const toggleMenu = document.querySelector('[data-js-action="toggle-menu"]')
const menu = document.querySelector('[data-js-target="menu"]')

if (toggleMenu && menu){
    toggleMenu.addEventListener('click',function (){
        const isOpen= menu.classList.toggle('is-open');
        toggleMenu.setAttribute('aria-expanded',isOpen);
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
            copyStatus.textContent = "kopierad!";
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

//projekt
const filterProjects= document.querySelector('[data-js-action="filter-projects"]')
const filterStatus = document.querySelector('[data-js-target="filter-status"]')
const projectList =document.querySelector('[data-js-target="project-list"]')
const toggleDetails = document.querySelector('[data-js-action="toggle-details"]')
const projectDetails = document.querySelector('[data-js-target="project-details"]')

if(filterProjects && filterStatus){
    filterProjects.addEventListener('input',function () {
        const searchTerm = filterProjects.value;
        filterStatus.textContent = "Visar resultat för: " + searchTerm;
        if (projectList) {
            const projectItems = projectList.querySelectorAll('.project-item');
            projectItems.forEach(function (item) {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm.toLowerCase())) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        }
    });
}
if (toggleDetails && projectDetails){
    toggleDetails.addEventListener('click',function (){
        projectDetails.classList.toggle('is-open');

    });
}

//end of projekt