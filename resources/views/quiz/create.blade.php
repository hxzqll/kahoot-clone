@extends('layouts.app')

@section('content')
    {{-- {{$p ?? ''}} --}}
    <script>
        slideCount = 1;
        let validate=()=>{
            var logs = '------Error Log------ \n';
            let error = false;
            for(let i = 1;i <= slideCount; i++){
                let title = document.getElementById(`title-${i}`);
                let a1 = document.getElementById(`a1-${i}`);
                let a2 = document.getElementById(`a2-${i}`);
                let a3 = document.getElementById(`a3-${i}`);
                let a4 = document.getElementById(`a4-${i}`);
                let correct = document.getElementById(`correct-${i}`);

                if(title.value.length == 0){
                    error = true;
                    logs = logs + `Please Fill Title on Slide ${i}\n`;
                }
                if(a1.value.length == 0){
                    error = true;
                    logs = logs + `Please Fill Answer 1 on Slide ${i}\n`;
                }
                if(a2.value.length == 0){
                    error = true;
                    logs = logs + `Please Fill Answer 2 on Slide ${i}\n`;
                }
                if(a3.value.length == 0){
                    error = true;
                    logs = logs + `Please Fill Answer 3 on Slide ${i}\n`;
                }
                if(a4.value.length == 0){
                    error = true;
                    logs = logs + `Please Fill Answer 4 on Slide ${i}\n`;
                }
                if(correct.value == 'Correct Option'){
                    error = true;
                    logs = logs + `Please Fill Correct Option on Slide ${i}\n`;

                }
                logs = logs + '\n';
            
                
            }
                if(error){
                    alert(logs);
                } else {
                    document.getElementById('submitButton').click();
                }
            
        }


        let selectSlide=(x)=>{
            for(var i=1; i <= slideCount;i++){
                if(i != x ){
                    // if(document.getElementById(`slude`))
                    document.getElementById(`slide-${i}`).classList.add('hidden');
                    document.getElementById(`slide-btn-${i}`).classList.remove('border-solid');
                    document.getElementById(`slide-btn-${i}`).classList.remove('border-2');
                    document.getElementById(`slide-btn-${i}`).classList.remove('border-sky-700');
                }
                if(i == x){
                    document.getElementById(`slide-${i}`).classList.remove('hidden');
                    document.getElementById(`slide-btn-${i}`).classList.add('border-solid');
                    document.getElementById(`slide-btn-${i}`).classList.add('border-2');
                    document.getElementById(`slide-btn-${i}`).classList.add('border-sky-700');


                }
            }
        }
        let addSlide = ()=>{
        
            slideCount++;
            document.getElementById('slideCounter').value = slideCount;
            var slidesContainer = document.getElementById('slidesContainer');
            let prevB = slideBtnContainer.innerHTML;
            slideBtnContainer.innerHTML = prevB + `
            <div id="slide-btn-${slideCount}" class="bg-gray-100 w-4/4 mt-4 h-24 flex h-screen justify-center items-center" onclick="selectSlide(${slideCount})">
                    Slide ${slideCount}
                </div>
            `;
        slidesContainer.insertAdjacentHTML('beforeend',` <x-slide classes="hidden" id=${slideCount} />`);

        }
    </script>
    <form method="post" action="{{route('create.quiz',['id'=>$id])}}">
        @csrf
    <input class="hidden" id="slideCounter" name="slideCount" value="1"/>
    <div class="flex justify-center">
        <div class="w-11/12 h-min bg-white flex">
            <div class="flex-initial w-1/4 p-6 bg-gray-300 overflow-scroll overflow-x-hidden">
                <button type="button" class="bg-color text-white px-4 py-3 font-medium w-full" onclick="addSlide()">
                    Add Slide
                </button>
                <div class="h-96" id='slideBtnContainer' >
                <div id='slide-btn-1' class="bg-gray-100 w-4/4 mt-4 h-24 flex h-screen justify-center items-center border-solid border-2 border-sky-700"  onclick="selectSlide(1)">
                    Slide 1
                </div>
               
                </div>
                
            </div>
            <div class="flex-initial w-3/4 p-6" id="slidesContainer">
                <x-slide classes="" id="1"/>
                
            </div>
        </div>
        
    </div>
    <div class="flex justify-center mt-5"> 
    <button type="button" onclick="validate()" class="bg-gray-800 text-white px-4 py-3 font-medium items hover:bg-gray-500">
       Save Quiz
    </button>
    <button class="bg-gray-100 hidden" type="submit" id="submitButton">BTN</button>

    </div>

    </form>
@endsection