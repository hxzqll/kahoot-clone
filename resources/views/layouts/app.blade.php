<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link  href="{{ asset('css/app.css')}}" rel="stylesheet" >
    <style>
        .bg-color {
            background-color: #0D011C;
        }
        .nav-color {
            background-color: #06000d;
        }
        .input-bg{
            background-color: #C4C4C4;
        }
    </style>
    <script>


        function chooseImage(x) {
            console.log(x);
            let imageElement = document.getElementById(`choose-${x}`);
            imageElement.click();         
        }
        function selectImage(x){
            let imageElement = document.getElementById(`choose-${x}`);
            
            if(imageElement.files.length > 0){
                let imageText = document.getElementById(`imagetext-${x}`);
                // let imagePrev = document.getElementById('imagePrev');
                imageText.textContent = imageElement.files[0].name + ' was Selected';
                
                // const fileReader = new FileReader();
                //  fileReader.readAsDataURL(imageElement.files[0]);
                //  fileReader.addEventListener("load", function () {
                //     imgPrev.style.display = "block";
                //     imgPrev.innerHTML = '<img src="' + this.result + '" />';
                //     // console.log(this.result);
                //     // imagePicker.style.backgroundImage = '"'+ this.result + '"';
                // });    
                // console.log(f.result);
                
            }

        }
       
    
      
    </script>
</head>
<body class="bg-color">

    <nav class="p-6 nav-color text-white flex justify-between mb-6">
        <ul class="flex items-center">
            @auth
            <li>
                <a href="{{ route('home') }}" class="p-3">Your Quizzes</a>
            </li>
            {{-- <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li> --}}
            
            <li>
                <a href="{{ route('landing.quiz') }}" class="p-3">Create Quiz</a>
            </li>
            @endauth
            
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form method="post" action={{route('logout')}} class="p-3 inline">
                    @csrf
                    <button type='submit'>Logout</button>
                    </form>
                </li>
            @endauth  
            @guest
                <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register')}}" class="p-3">Register</a>
                </li>
            @endguest 

          
           
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>