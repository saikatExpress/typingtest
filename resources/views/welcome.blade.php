<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Typing Test</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/text.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
      <style>
        input::placeholder {
          color: black;
        }
      </style>

</head>
<body style="background-color: £fff;">
    <!-- navbar starts  -->
    <nav class="bg-[#02668D] text-white  mx-auto py-[10px]">
      <div class="flex justify-between px-4 max-w-[1100px] mx-auto items-center">
          <!-- Left side: Number and Social Media Icons -->
          <div class="flex items-center space-x-4">
              <!-- Number -->
              <span class="md:text-xl text-lg">+8801729149634</span>
              <!-- Social Media Icons -->


          </div>
          <!-- Right side: Placeholder for other content (e.g., logo, menu) -->
          <div class="flex gap-2 items-center justify-center ">
           <a class=" px-[6px] py-[1px] md:text-[20px] text-[15px] duration-300 border border-transparent hover:border hover:border-white rounded-full" href=""> <i class="fa-brands fa-facebook"></i></a>
           <a class=" px-[6px] duration-300 md:text-[20px] py-[1px] ext-[15px] border border-transparent hover:border hover:border-white rounded-full" href=""> <i class="fa-brands fa-instagram"></i></a>
           <a class=" px-[6px] duration-300 md:text-[20px] py-[1px] border ext-[15px] border-transparent hover:border hover:border-white rounded-full" href="">  <i class="fa-brands fa-linkedin"></i></a>
          </div>

      </div>
  </nav>
     <!-- navbar end -->



     <h2 class="md:text-5xl text-3xl flex justify-center font-bold font-bold text-center px-4 pt-[40px] text-transparent bg-clip-text bg-gradient-to-r from-[#02668D] to-[#02668D]">
      <a href="https://git.io/typing-svg">
        <img src="https://readme-typing-svg.herokuapp.com?font=roboto&weight=900&size=50&pause=1000&color=02668D&width=520&height=80&lines=+Bengali+Typing+Test" alt="Typing SVG" />
    </a>

    </h2>
     <div class="px-4">
        <div class="bg-gradient-to-r rounded-md shadow-md from-[#2BBCE3] to-[#2BBCE3] max-w-[1100px] mx-auto h-[500px]">
            <p class="p-4 md:text-[16px] text-[13px] font-semibold text-center text-gray-900">
                Preparing for Bengali typing test. Check your Typing speed in Bengali. The Free online Bengali Typing Test will show your Typing Speed in WPM and Accuracy. You can take more test to practise the exam you have to crack, This can be use as a Speed Improve Software for Bengali Typing. The World's First & Only Typing Test Software for Bengali Language.
            </p>

          <div class="">

            @if(session('message'))
                <div class="alert alert-success" id="success-message">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('failed') }}
                </div>
            @endif

            <form id="typing-form" class="md:mt-[70px] mt-[25px] w-full mx-auto mx-auto mt-12 p-4" action="{{ route('writing.store') }}" method="POST">
                @csrf
                <table class="max-w-[440px] mx-auto">
                    <tr>
                        <td class="w-1/3 text-sm px-2 group font-medium text-gray-700 border border-black">
                            <label for="name" class="text-black md:text-[14px] text-[12px]  duration-300 ease-in-out">
                                Your Name
                            </label>
                        </td>
                        <td class="w-2/3 border text-black border-black">
                          <input type="text" id="name" name="name" class="p-2 h-full w-full text-black" placeholder="Enter your name" required>
                        </td>
                    </tr>

                    <tr>
                      <td class="w-1/3 text-sm px-2 group font-medium text-gray-700 border border-black">
                          <label for="std_id"  class="text-black md:text-[14px] text-[12px]duration-300 ease-in-out">
                            Your ID
                        </label>
                      </td>
                      <td class="w-2/3 border text-black border-black">
                        <input type="number" id="std_id" name="std_id" class="p-2 h-full w-full text-black" placeholder="Enter your Id" required>
                      </td>
                  </tr>
                  <tr>
                    <td class="w-[170px] text-sm px-2 group font-medium text-gray-700 border border-black">
                        <label for="passage" class="text-black md:text-[14px] text-[12px] duration-300 ease-in-out">
                            Typing Category
                        </label>
                    </td>
                    <td class="w-2/3 border border-black">
                        <select id="category" name="type" class="p-2 h-full w-full text-black" required>
                            <option value="english">English</option>
                            <option value="bangla">Bangla</option>
                        </select>
                    </td>
                </tr>

                    <tr>
                        <td class="w-1/3 text-sm px-2  font-medium text-gray-700 border border-black">
                            <label for="passage" class="text-black md:text-[14px] text-[12px]  ">
                                Select Time for Test
                            </label>
                        </td>
                        <td class="w-2/3 border border-black">
                            <select id="passage" name="time_count" class="p-2 w-full h-full" required>
                                <option value="1">1 min</option>
                                <option value="2">2 min</option>
                                <option value="5">5 min </option>
                                <option value="10">10 min </option>
                                <option value="15">15 min </option>
                                <option value="free">free Time </option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="w-[170px] text-sm px-2 group font-medium text-gray-700 border border-black">
                            <label for="passage" class="text-black md:text-[14px] text-[12px] duration-300 ease-in-out">
                                Select Passage
                            </label>
                        </td>
                        <td class="w-2/3 border border-black">
                            <select id="total_word" name="total_word" class="p-2 h-full w-full text-black" required>
                                <option value="">--select passage--</option>
                                <option value="200">200 word Passage </option>
                                <option value="300">300 word Passage </option>
                                <option value="400">400 word Passage </option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="border border-black">
                            <button type="submit" class="w-full bg-[#158EBD] text-[14px] text-[12px]  hover:bg-[#02668D] text-white p-2  transition duration-300" id="start_typing">
                               Start Typing
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
          </div>
         </div>
     </div>
     <!-- main typing design end -->


       <!-- secound page start -->
    <div class="min-h-screen flex items-center px-4 mt-[50px] justify-center" id="passage_box" style="display: none;">

        <div class="bg-gradient-to-r rounded-md shadow-md from-[#2BBCE3] to-[#2BBCE3] shadow-md  p-6 max-w-[1100px] w-full">
          <!-- Header Table -->
          <div class="grid md:grid-cols-4 grid-cols-2 gap-2 text-center bg-blue-200  p-2 text-blue-900 font-semibold">
            <div class="flex gap-4 bg-[#158EBD] py-2 text-white items-center justify-center">
                <span>GWPM</span>
                <span>0.00</span>
            </div>
            <div class="flex gap-4 bg-[#158EBD] py-2 text-white  items-center justify-center">
                <span>NWPM</span>
                <span>0.00</span>
            </div>
            <div class="flex gap-4 bg-[#158EBD] py-2 text-white items-center justify-center">
                <span>ACCU</span>
                <span class="flex gap-2 items-center">0.00 <span>%</span></span>
            </div>

            <div class="flex gap-4 bg-[#158EBD] py-2 text-white items-center justify-center" id="timer">
                <span>TIME</span>
                <span>0.00</span>
            </div>

          </div>

          <!-- Text Area -->
          <div class="mt-4 bg-blue-50
          h-[350px] p-4 overflow-y-auto h-48 text-justify text-gray-700">
            <p id="textPassage">

            </p>
            <input type="text" id="typeTime" value="">
            <div id="typing-results"></div>
          </div>
          <div id="response-message"></div>
          <!-- Input Field -->
          <div class="mt-4">
            <input type="text" id="type_here" placeholder="Type here..." class="w-full h-[50px] border border-gray-300  px-4 py-2 focus:outline-none  focus:border-black"/>
          </div>
        </div>
    </div>

    <div class="px-4" id="result_box" style="display: none;">
        <div class="bg-[#4ACBEB] shadow-md rounded-md max-w-[1100px] mt-[30px]  mx-auto flex items-center justify-center py-10">
            <div class="bg-[#158EBD] px-4 w-[1000px] border border-gray-700 shadow-lg  p-6">
            <table class="table-auto border-collapse w-full bg-[#52CFED] text-left text-sm border border-gray-600">
                <tbody>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Name</td>
                    <td class="py-2 px-4 border border-gray-700 w-1/2" id="std_name"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Gross Word Per Minute</td>
                    <td class="py-2 px-4 border border-gray-700" id="gwpm"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Net Word Per Minute</td>
                    <td class="py-2 px-4 border border-gray-700" id="net_wpm"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Accuracy</td>
                    <td class="py-2 px-4 border border-gray-700" id="accuracy"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Double [Word][Count]</td>
                    <td class="py-2 px-4 border border-gray-700" id="double_words"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Skipped</td>
                    <td class="py-2 px-4 border border-gray-700" id="skipped_words"></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-700 font-semibold">Wrong Word Typed</td>
                    <td class="py-2 px-4 border border-gray-700">[রেডিও][g]</td>
                </tr>
                </tbody>
            </table>
            <div class="mt-4 text-center">
                <a href="#" class="text-gray-300 hover:underline font-semibold">Test Again</a>
            </div>
            </div>
        </div>
    </div>

    <!-- main typing design start -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="flex justify-between px-8">
            <p>&#169; 2025 Your Company. All rights reserved.</p>
            <p><a href="https://freelanceit.com.bd/" target="_blank">Freelance IT Software Solution</a></p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/type.js') }}"></script>
</body>
</html>
