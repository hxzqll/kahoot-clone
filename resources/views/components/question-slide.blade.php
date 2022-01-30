@props(["classes"=>$classes,"id"=>$id,"title"=>$title, "a1"=>$a1, "a2"=>$a2, "a3"=>$a3, "a4"=>$a4])

<div class="mb-4 {{ $classes }}" id="slide-{{$id}}">
    
    <div id="image" class="bg-gray-800 w-4/4 flex h-64 justify-center items-center hover:bg-gray-700 text-white">
        <p class="text-2xl font-bold" id="imagetext-{{$id}}" >{{$title}}</p>
    </div>
    
        <div class="grid grid-rows-2 grid-flow-col gap-10 mt-4 justify-center">
            <div>
                <input type="button" onclick="attemptQuestion({{$id}},1)" value={{$a1}}  id="a1-{{$id}}" name="a1[{{$id}}]" class="bg-red-500 p-4 pl-14 pr-14 placeholder-gray-300 text-white text-center">
            </div>
            <div>
                <input type="button" onclick="attemptQuestion({{$id}},2)" id="a2-{{$id}}" value={{$a2}} name="a2[{{$id}}]" class="bg-blue-500 placeholder-gray-300 pl-14 pr-14 text-white p-4 text-center">

            </div>
            
            <div>
                <input type="button" onclick="attemptQuestion({{$id}},3)" id="a3-{{$id}}" value={{$a3}} name="a3[{{$id}}]" class="bg-yellow-500 placeholder-gray-300 pl-14 pr-14 text-white p-4 text-center ml-8">

            </div>
            <div>
                <input type="button" onclick="attemptQuestion({{$id}},4)"  id="a4-{{$id}}" value={{$a4}} name="a4[{{$id}}]" class="bg-green-500 pl-14 pr-14 placeholder-gray-300 text-white p-4 text-center ml-8">

            </div>
            <br>
            
        </div>
</div>