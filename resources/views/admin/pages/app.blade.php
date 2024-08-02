<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
    @vite('resources/css/adminDashboard.css')
</head>
    <body>

        {{-- <!-- Button to trigger the popup -->
        <button class="btn btn-primary" onclick="showPopup()">Show Popup</button> --}}

        @if (session('success'))
            <script>
                window.addEventListener("load", (event) => {
                    trigger();
                });
            </script>
        @elseif($errors->has('email'))
            <script>
                window.addEventListener("load", (event) => {
                    trigger();
                });
            </script>
        @endif

        {{-- <script>
        window.addEventListener("load", (event) => {
            trigger();
        });
        </script> --}}

        @php 

        if(session('success')) {
            $msg = session('success');
            $word = explode(' ', $msg);
            $firstWord = $word[0];

            $string = session('success');
            $sWord = explode(' ', $string);
            array_shift($sWord);
            $mod = implode(' ', $sWord);
        } else {
            $msg = $errors->first('email');
            $word = explode(' ', $msg);
            $firstWord = $word[0];

            $string = $errors->first('email');
            $sWord = explode(' ', $string);
            array_shift($sWord);
            $mod = implode(' ', $sWord);
        }
   
        

        



        @endphp

        <!-- Popup Message -->
        <div class="popup 
            @if(session('success'))
                bg-success
            @else
                bg-danger
            @endif
            " id="popup">
        <span><strong>
            {{ 
            
                $firstWord
                
            }}
        </strong> 
            {{ $mod }}
        </span>
        </div>

    @include('admin.pages.sidebar')

    @include('admin.pages.header')
    @include('admin.pages.breadCrumbs')
    @yield('content')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script>
        $(function () {
        $('.datepicker').datepicker({
            language: "es",
            autoclose: true,
            format: "dd/mm/yyyy"
            });
        });

    </script>
    <script>
        
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
    </script>

    <script>

        

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
    </script>
    

    <script>
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

    </script>
    <script>
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
        
    </script> --}}
    
    </body>
</html>
