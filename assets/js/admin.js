/* =====================================================
   Admin Panel — JavaScript
   ===================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // Sidebar toggle (mobile)
    const adminToggle = document.getElementById('adminToggle');
    const adminSidebar = document.getElementById('adminSidebar');

    if (adminToggle) {
        adminToggle.addEventListener('click', function () {
            adminSidebar.classList.toggle('show');
        });
    }

    // Close sidebar when clicking outside (mobile)
    document.addEventListener('click', function (e) {
        if (window.innerWidth < 992 && adminSidebar && adminSidebar.classList.contains('show')) {
            if (!adminSidebar.contains(e.target) && e.target !== adminToggle) {
                adminSidebar.classList.remove('show');
            }
        }
    });
});
