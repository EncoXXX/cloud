$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
                $('#move_btn').toggleClass('active');
                $(this).toggleClass('active');
            });
        });