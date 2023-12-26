<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birth Certificate</title>

    <style>
        .custom-font {
            font-family: my_custom_name;


        }

        /* https://sebamr.shop/bdris/public/birth2.png */
        body {
            font-family: Arial, sans-serif !important;
            background-image: url('https://bdris.verification-online.site/bdris/public/birth1.png');
            background-repeat: no-repeat;
            background-position: center 75%;
            /* Centered vertically */
            background-size: cover;
            position: relative margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="">
    <img style="padding-top: 6%;padding-left: 40% ; width: 13%; " src="https://bdris.verification-online.site/bdris/public/birth2.png"
        alt="">


    <section style="margin-top: -5%">


        <div style="float: left;">
            @php
                echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('https://bdris.gov.bd/certificate/verify?key=0xkrIcrBc6Zidup0jodGwZUzuxOPptf1gPCTKpGK+cCaZ+qe2UjuKSlMBOXyvHp8', 'QRCODE', 3, 3) . '" alt="barcode"   />';

            @endphp
            <div style="margin-left: 4%;margin-top: 2%;font-size: 18px;color: rgb(156, 143, 123)">
                HAZM
            </div>
        </div>



        <div style="margin-left: 20%;margin-top: -24%">
            <div style="margin-left: 60%;">
                @if ($Data['birth_registration_number'])
                    @php
                        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($Data['birth_registration_number'], 'C128', 1.5) . '" alt="barcode"   />';

                    @endphp
                @else
                    @php
                        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('0000000000000000', 'C128', 1.5) . '" alt="barcode"   />';

                    @endphp
                @endif

            </div>
            <div style="margin-top: 20px ;display: flex;text-align: center">

                <div style="font-size: 24px;
                font-weight: 190">Government of the People’s Republic of
                    Bangladesh</div>
                <div style="font-size: 17px;">Office of the Registrar, Birth and Death
                    Registration



                </div>
                <div class="custom-font" style="font-size: 17px">


                    {{ strtoupper($Data['registration_office']) }}



                </div>
                <div class="custom-font" style="font-size: 17px">
                    
                    {{ strtoupper($Data['location_of_registered_office']) }}
                </div>
                <div tyle="font-size: 1px">

                    (Rule 9, 10)

                </div>

                <h1 class="custom-font" style="font-size: 27px;margin-top: -5px">জন্ম নিবন্ধন সনদ /Birth Registration
                    Certificate</h1>

            </div>
    </section>


    <main class="" style="margin-left: -120px">
        <div>
            <span style="display: block">
                Date of Registration
            </span>
            <div style="margin-left: 35%;margin-top: -3% ;font-size: 19px;font-weight: 500;margin-right: 0px">
                Birth Registration Number

            </div>
            <div style="margin-left: 80%;margin-top: -3%">
                Date of Issuance
            </div>

        </div>
        <div>
            <span style="display: block">
                @if ($Data['registration_date'])
                    {{ $Data['registration_date'] }}
                @else
                    dd/mm/yyyy
                @endif

            </span>
            <h3 style="margin-left: 36%;margin-top: -3% ; display: inline">

                @if ($Data['birth_registration_number'])
                    {{ $Data['birth_registration_number'] }}
                @else
                    0000000000000000
                @endif

            </h3>



        </div>
        <div style="margin-left: 80%;margin-top: -5%">
            {{ $Data['issuance_date'] }}
        </div>





    </main>
    <div>

        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;font-weight: 500;">
                Date of Birth
            </div>
            <div style="font-size: 18px;font-weight: 500;">
                In Word

            </div>
            <div>



            </div>
            <div style="margin-left: 80%;margin-top: -5%">


            </div>





        </main>
        <main class="" style="margin-left:3% ;margin-top: -2%">
            <div style="font-size: 18px;font-weight: 500;">
                : {{ $Data['date_of_birth'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;">
                : {{ $Data['in_word'] }}


<!--{{ $Data['in_word'] }}-->
            </div>
            <div>



            </div>
            <div style="margin-left: 80%;margin-top: -5%">


            </div>





        </main>
        <main class="" style="margin-left:60% ;margin-top: -3%">
            <div style="font-size: 18px;font-weight: 500;">
                Sex : {{ $Data['sex'] }}
            </div>


        </main>
    </div>
    <div style="margin-top: 5%;" class="custom-font">

        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;font-weight: 500;">
                নাম
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : {{ $Data['registered_person_name_bangla'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Name
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : {{ $Data['registered_person_name'] }}
            </div>






        </main>
        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;font-weight: 500;">
                মাতা
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : {{ $Data['mother_name_bangla'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Mother
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : {{ $Data['mother_name'] }}
            </div>






        </main>
        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;font-weight: 500;">
                মাতার জাতীয়তা
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : {{ $Data['mother_nationality_bangla'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Nationality
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : {{ $Data['mother_nationality'] }}
            </div>






        </main>
        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;font-weight: 500;">
                পিতা
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : {{ $Data['father_name_bangla'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Father
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : {{ $Data['father_name'] }}
            </div>






        </main>
        <main class="" style="margin-left: -120px ;margin-top: 4%">
             <div style="font-size: 18px;font-weight: 500;">
                পিতা জাতীয়তা
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : বাংলাদেশী
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Nationality
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : Bangladeshi
            </div>






        </main>
        <main class="" style="margin-left: -120px ;margin-top: 4%">
            <div style="font-size: 18px;">
                জন্মস্থান
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:20% ;margin-top: -4%">
                : {{ $Data['place_of_birth_bangla'] }}
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:45% ;margin-top: -4%">
                Place of Birth
            </div>
            <div style="font-size: 18px;font-weight: 500;margin-left:65% ;margin-top: -4%">
                : {{ $Data['place_of_birth'] }}
            </div>






        </main>
        <main class="custom-font" style="margin-left: -120px ;margin-top: 4% ">

            <table>

                <!-- Add more rows as needed -->
            </table>
            <table>
                <tr style="font-size: 200px;font-size: 18px;font-weight: 500;">
                    <td class="custom-font" style="padding-right: 6px;font-size: 18px;width: 137px">স্থায়ী ঠিকানা</td>
                    <td class="custom-font" style="padding-right:10px;font-size: 18px;font-weight: 500;width: 157px">
                        :{{ $Data['permanent_address_bangla'] }}
                    </td>
                    <td style=" padding-right: 47px;font-size: 18px;font-weight: 500;padding-left: 2%">Permanent <br>
                        Address</td>
                    <td style="font-size: 18px;font-weight: 500;">:{{ $Data['permanent_address'] }}</td>
                </tr>

                <!-- Add more rows as needed -->
            </table>




        </main>
        <main class="" style="margin-left: -120px ;margin-top: 10%">
            <div style="width: 50%">
                <div style="font-size: 18px;font-weight: 500;">
                    Seal & Signature
                </div>
                <div style="">
                    Assistant to Registrar
                </div>
                <div style="">

                    (Preparation, Verification)
                </div>
            </div>
            <div style="width: 50% ;margin-left: 70%;margin-top: -10%">
                <div style="font-size: 18px;font-weight: 500;">
                    Seal & Signature
                </div>
                <div style="">
                    Registrar
                </div>

            </div>





        </main>




    </div>
    <div style="margin-top: 20%;font-size:10px">
        This certificate is generated from bdris.gov.bd, and to verify this certificate, please scan the above QR Code &
        Bar
        Code
    </div>
</body>

</html>
