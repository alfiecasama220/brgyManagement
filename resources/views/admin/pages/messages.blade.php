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