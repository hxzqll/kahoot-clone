@props(['classes'=>$classes,'id'=>$id])
<div class="mb-4 {{ $classes }}" id="slide-{{$id}}">
    <input placeholder= "Enter a Title for Slide {{$id}}" name='title[{{$id}}]' id="title-{{$id}}" type="text" name='title' class="bg-gray-100 border-2 w-full p-4 text-center required">
    {{-- <div onclick="chooseImage({{$id}})" id='imagePicker' class="bg-gray-800 w-4/4 h-32 flex h-screen justify-center items-center hover:bg-gray-700 text-white">
       
        <input type="file" id='choose-{{$id}}'  onchange="selectImage({{$id}})" style="display:none" accept="image/png,image/jpeg">
        <p class="text-2xl font-bold" id='imagetext-{{$id}}' >Click to add an Image</p>
    </div> --}}
    
        <div class="grid grid-rows-2 grid-flow-col gap-4 mt-10 justify-center">
            <div>
                <input type="text" id="a1-{{$id}}" name="a1[{{$id}}]" class="bg-red-500 p-4 placeholder-gray-300 text-white text-center" placeholder="Add Answer 1">
            </div>
            <div>
                <input type="text" id="a2-{{$id}}" name="a2[{{$id}}]" class="bg-blue-500 placeholder-gray-300 text-white p-4 text-center" placeholder="Add Answer 2">

            </div>
            
            <div>
                <input type="text" id="a3-{{$id}}" name="a3[{{$id}}]" class="bg-yellow-500 placeholder-gray-300 text-white p-4 text-center ml-8" placeholder="Add Answer 3">

            </div>
            <div>
                <input type="text" id="a4-{{$id}}" name="a4[{{$id}}]" class="bg-green-500 placeholder-gray-300 text-white p-4 text-center ml-8" placeholder="Add Answer 4">

            </div>
            <br>
            
        </div>
        <div class="justify-center flex mt-4">
            {{-- <label for="correctOption">Choose Correct Option</label> --}}

            <select class="p-1" class="text-medium" id="correct-{{$id}}" name="correct[{{$id}}]">
                <optgroup class="text-lg">
                <option disabled selected value="Correct Option" class="text-medium">Correct Option</option>
                <option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Yellow</option>
                <option value="4">Green</option>
                </optgroup>
            </select>
        </div>
</div>