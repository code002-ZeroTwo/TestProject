<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .card {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .upper-section {
            display: flex;
            gap: 15%;
        }


        .text-container {
            font-weight: bold;
        }

        .texts {
            text-align: center;
        }

        .Red-text-container {
            color: red;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
        }

        .Red-Big-text-container {
            color: red;
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
            font-weight: bold;
            border: 0;
        }

        .Big-text-container {
            font-size: 20px;
            font-weight: bold;
            padding: 0px;
            margin: 0px;
        }

        .DisabilityIDCard {
            width: 250px;
            height: 50px;
            background-color: red;
            align-items: center;
            background-color: red;
            border: 0;
            border-radius: 100px;
            box-sizing: border-box;
            color: white;
            display: inline-flex;
            font-size: 16px;
            font-weight: 600;
            justify-content: center;
            padding: 0px;
            padding-left: 20px;
            padding-right: 20px;
            text-align: center;
            vertical-align: middle;
            font-family: 'Times New Roman', 'Poppins', sans-serif;
        }

        .middle-section {
            margin-top: 20px;
        }



        .address-details p {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        .address-details strong {
            margin-right: 10px;
        }

        .lower-section {
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .lower-section .left-side div {
            color: red;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;
        }

        .lower-section p {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .lower-section .right-side {
            margin-top: 55px;
            height:20px;
            font-family: 'Times New Roman', Times, serif;
        }

        .lower-section .right-side .text{
           color: red; 
        }

        .lowest-section {
           background-color: red; 
           position: absolute;
           bottom: 0;
           right: 0;
           color: white;
           text-align: center;
           font-weight: bold;
           width: 100%;
        }
    </style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div class="card">

                        <div class="upper-section">

                            <div>
                                <!--section for logo id card ,id card type -->

                                <!-- logo section -->
                                <div>

                                </div>

                                <!-- text section -->
                                <div class="text-container">
                                    Identity Card
                                </div>
                                <div class="text-container">
                                    Identity Card Type: 'D'
                                </div>


                            </div>
                            <div class="texts">
                                <!-- section for heading municipality, gorkha -->
                                <div class="Red-text-container">Palungtar Municipality</div>
                                <div class="Red-Big-text-container">Office Of The Municipal Executive</div>
                                <div class="Big-text-container">Palungtar,Gorkha</div>
                                <div class="Big-text-container">Gandaki Province,Nepal</div>

                                <div class="DisabilityIDCard">
                                    Disability Identity Card
                                </div>
                            </div>
                        </div>

                        <div class="middle-section text-container">
                            <div class="address-details">
                                <p><strong>Full Name of person: {{ Auth::user()->name }}</p></strong>
                            </div>
                            <div class="address-details">
                                <p>
                                    <strong>Address: Gandaki province</strong>
                                    <strong>District: Gorkha</strong>
                                    <strong>Palungtar Municipality</strong>
                                    <strong>Ward No:{{ Auth::user()->ward }}</strong>
                                </p>
                            </div>

                            <div class="address-details">
                                <p>
                                    <strong>Date of Birth: {{ Auth::user()->dob }}</strong>
                                    <strong>Citizenship Number: {{ Auth::user()->citizenship }}</strong>
                                    <strong>Sex: {{ Auth::user()->sex }}</strong>
                                    <strong>Blood Group:{{ Auth::user()->blood_group }}</strong>
                                </p>
                            </div>

                            <div class="address-details">
                                <p>
                                    <strong>Types of disability:</strong>
                                    <strong>On the basis of nature: {{ Auth::user()->nature}}</strong>
                                    <strong>On the basis of Severity: {{ Auth::user()->severity}}</strong>
                                    <strong>Blood Group:{{ Auth::user()->blood_group }}</strong>
                                </p>
                            </div>

                            <div class="address-details">
                                <p>

                                    <strong>Father Name or Mother Name or Guardian Name: {{
                                        Auth::user()->name_of_guardian }}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="lower-section">
                            <div class="left-side">
                                <div>Approved by</div>
                                <p>Name: </p>
                                <p>Signature: </p>
                                <p>Date: </p>
                            </div>

                            <div class="right-side">
                                <p>...............................................</p>
                                <p class="text">Signature of ID card Holder</p>
                            </div>


                        </div>


                        <div class="lowest-section">
                            <i>"if somebody finds this ID card, please deposit this in the nearby police or municipality office"<i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>