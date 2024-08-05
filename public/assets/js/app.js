    $(function () {
        $('.datepicker').datepicker({
            language: "es",
            autoclose: true,
            format: "dd/mm/yyyy"
            });
        });

    $(document).ready(function() {
        $('#togglePassword').on('click', function() {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
        });
    });

    function toggleNewPopup() {
        var newOverlay = document.getElementById("newPopupContainer");
        var newPopup = newOverlay.querySelector(".new-popup");
        newOverlay.classList.toggle("show");
        newPopup.classList.toggle("show");
    }

    var selectedIcon = "";
    var selected = document.getElementById('selectedIconInput');

    // Handle icon selection
        document.querySelectorAll('.new-icon-option').forEach(item => {
            item.addEventListener('click', event => {
                selectedIcon = item.getAttribute('data-icon');
                // console.log('Selected Icon:', selectedIcon);

                document.getElementById('selectedIconDisplay').innerHTML = `<i class="bi bi-${selectedIcon}"></i>`;
                document.getElementById('iconSelectBtn').setAttribute('data-selected-icon', selectedIcon);
                selected.value = selectedIcon;
                

                toggleNewPopup();
                // `<i class="bi bi-${selectedIcon}"></i>`
            });


    });



    // Toggle Side Popup
    var toggleSidePopup = document.getElementById('toggleSidePopup');
    if(toggleSidePopup) {
    toggleSidePopup.addEventListener('click', function() {
        document.getElementById('sidePopup').classList.toggle('show');
    });
    }

    // Close Side Popup
    var closeSidePopup = document.getElementById('closeSidePopup');
    if(closeSidePopup) {
    closeSidePopup.addEventListener('click', function() {
        document.getElementById('sidePopup').classList.remove('show');
    });
    }

    // Close Side Popup on Escape key
    document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        document.getElementById('sidePopup').classList.remove('show');
    }
    });


    function showPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "block";
        setTimeout(function() {
            popup.style.display = "none";
        }, 3000); // 3000 milliseconds = 3 seconds
    }
    function trigger() {
        showPopup();
    }


    var voterIDPromt = document.getElementById('voterIDPromt');
        document.addEventListener('DOMContentLoaded', (event) => {
            var roles = document.getElementById('role');
            if(roles) {
                document.getElementById('role').addEventListener('click', () => {
                var role = document.getElementById('role').value;
                role.value = role;
                if(role == 1) {
                    voterIDPromt.classList.add('voterIDPromtShow');
                } else {
                    voterIDPromt.classList.remove('voterIDPromtShow');
                }
            });
        }
        })


        
    $(document).ready(function() {
        // When an image is clicked, set the modal image source
        $('.clickable-image').on('click', function() {
            var imgSrc = $(this).data('src');
            $('#modalImage').attr('src', imgSrc);
        });
    });
