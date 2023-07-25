//Výběr HTML tagů, se kterými budeme pracovat

const menuIcon = document.querySelector(".menu-icon")

const navigation = document.querySelector("nav")

const hamburgerIcon = document.querySelector(".fa-solid")

//Tady měníme hamburgerIcon, kde se togglene ikona
menuIcon.addEventListener("click", () => {

    if  (hamburgerIcon.classList[1] === "fa-bars"){
         hamburgerIcon.classList.remove("fa-bars")
        hamburgerIcon.classList.add("fa-xmark")
        navigation.style.display = "block"
    }else{
        hamburgerIcon.classList.remove("fa-xmark")
        hamburgerIcon.classList.add("fa-bars")
        navigation.style.display = "none"
    }
    //Doslova si to přečti z angličtiny do čestiny
    //Pokud se hamburgerIcon rovná "fa-bars", tak ho vyjmi a přijde hamburger icon("fa-xmark"), jinak ho přepni zase zpátky

})


