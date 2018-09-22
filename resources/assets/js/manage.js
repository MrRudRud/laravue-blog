const adminSlideoutButton = document.getElementById('admin-slideout-button');

//click event for adminSlideoutButton
if(adminSlideoutButton) {
    adminSlideoutButton.onclick = function () {
        // transition for button
        this.classList.toggle('is-active');
        // transition for menu
        document.getElementById('admin-side-menu').classList.toggle('is-active');
    }
}

// Get element by ClassName
const accordions = document.getElementsByClassName('has-submenu');

// Count how many ClassName ?
for (let i = 0; i < accordions.length; i++) {
    
    // Stay open menu when accordion 'has-submenu' has 'is-active' class
    if (accordions[i].classList.contains('is-active')) {
        const submenu = accordions[i].nextElementSibling;
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        submenu.style.marginTop = "0.75em"
        submenu.style.marginBottom = "0.75em"
    }

    // On event click 
    accordions[i].onclick = function () {
        this.classList.toggle('is-active'); // is Active in Bulma 
        const submenu = this.nextElementSibling; //use next element 
        // Checks 
        if (submenu.style.maxHeight) {// jika di submenu ada max-height maka buat jd NULL
            // Menu is open, we need to close it now
            submenu.style.maxHeight = null;
            submenu.style.marginTop = null;
            submenu.style.marginBottom = null;
        } else {
            // Menu is close, we need to open it now
            submenu.style.maxHeight = submenu.scrollHeight + "px"; //sebenarnya bisa langsung 75px;
            submenu.style.marginTop = "0.75em"
            submenu.style.marginBottom = "0.75em"
        }
        // console.log(submenu.style.maxHeight);
    }
}


