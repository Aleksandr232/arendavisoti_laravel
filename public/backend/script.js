// menu-sidebar
const navSidebarLink = document.querySelectorAll('.nav-sidebar a');

navSidebarLink.forEach(function (e) {
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = e.href;

    if(link === location){
        e.classList.add('active');
        if (e.closest('.has-treeview')) {
            e.closest('.has-treeview').classList.add('menu-open');
        }
    }
});



