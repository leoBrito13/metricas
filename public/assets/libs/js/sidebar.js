document.addEventListener("DOMContentLoaded", function () {
    const toggleSidebarButton = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const dashboardWrapper = document.querySelector(".dashboard-wrapper");
    const navbar = document.getElementById("navbarNav");

    toggleSidebarButton.addEventListener("click", function () {
        if (window.innerWidth > 992) {
            sidebar.classList.toggle("sidebar-collapsed");
            dashboardWrapper.classList.toggle("dashboard-wrapper-expanded");
        } else {
            sidebar.classList.toggle('show');
            navbar.classList.toggle('show');
            // sidebar.classList.toggle("sidebar-collapsed");
        }
    });

    // Fechar o sidebar ao clicar fora dele
    var toggleButton = document.getElementById('toggleSidebarmobile');
    toggleButton.addEventListener('click', function (event) {
        // Verifica se o clique foi fora do sidebar e do botão de toggle
        sidebar.classList.toggle('show'); // Remove a classe "show"
        navbar.classList.toggle('show');

    });
});