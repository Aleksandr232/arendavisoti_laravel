// script2.js
const dropdowns = document.querySelectorAll('.down');
const submenus = document.querySelectorAll('.submenu');
let openIndex = null;

dropdowns.forEach((dropdown, index) => {
  dropdown.addEventListener('click', function (event) {
    const submenu = submenus[index];
    if (submenu.classList.contains('show')) {
      submenu.classList.remove('show');
      openIndex = null;
    } else {
      if (openIndex !== null && openIndex !== index) {
        submenus[openIndex].classList.remove('show');
      }
      submenu.classList.add('show');
      openIndex = index;
    }
    event.stopPropagation();
  });
});

document.addEventListener('mousedown', function (event) {
    const target = event.target;
    let isInsideSubmenu = false;
    submenus.forEach((submenu) => {
        if (submenu.contains(target)) {
            isInsideSubmenu = true;
        }
    });

    if (!isInsideSubmenu && openIndex !== null) {
        submenus[openIndex].classList.remove('show');
        openIndex = null;
    }
});

// script3.js
const resume = document.getElementById('resume');
const me_site = document.getElementById('me_site');
    resume.addEventListener('mouseenter', function() {
    me_site.style.display="block";
});

resume.addEventListener('mouseleave', function() {
    setTimeout(function() {
        me_site.style.display = "none";
    }, 10000);
});


