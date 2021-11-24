<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Id Card</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        .main {
            width: 300px;
            height: 400px;
            margin: auto;
            margin-bottom: 30px;
            position: relative;
        }
        .background-image {
            height: 345px;
            width: 212px;
            border-radius: 6px;
            position: relative;
            border: 1px solid gray;
            position: absolute;
        }
        .main-data {
            height: 345px;
            width: 212px;
            position: absolute;
        }
        .right-div{
            margin: 60px 0 0 6 px;
            position: absolute;
        }
        .left-div {
            position: absolute;
            float: left;
            width: 160px;
            height: 212px;
        }
        .logo {
            position: absolute;
            margin: 80px 0 0 18px;
            text-align:center;
        }
        .logoindo {
            position: absolute;
            margin: -50px 0 0 18px;
        }
        .info {
            position: absolute;
            padding: 0 12px;
            height: 120px;
            margin-top: 100px;
        }
        .capitalize {
            text-transform: capitalize;
        }
        .register-hr {
            border-bottom: 1px solid black;
            width: 80px;
        }
        .back-div {
            padding: 10px;
            position: absolute;
            height: 180px;
            width: 208px;
            display:
        }
    </style>
</head>

<body>
    <div>
        <div class="main">
            <img class="background-image" src="{{public_path('images/idcard.jpg')}}" alt="">
            <img class="logoindo" src="{{public_path('images/indosat.png')}}" width="180" alt="">
            <div class="main-data">
                <div class="logo" style="font-size:15px; line-height: 1.5;">
                 
                    <div class="info">
                        <span class="capitalize"style="text-align: center;font-size:25px;">{{ $data['employee']->nama}}</span><br>
                        <span class="text-md"style="text-align: center;">{{$data['employee']->posisi}}</span><br>
                        <span class="text-md"style="text-align: center;">Email: {{$data['employee']->email}}</span><br>
                        <span class="text-md"style="text-align: center;">Grade:</span><br>
                        <span class="text-md"style="text-align: center;">{{$data['employee']->grade}}</span>
                    </div>
                </div>
                <div class="right-div" style="padding-left: 50px">
                    <img style="height: 80px; margin-left:15px;; margin-top:25px;"
                        src="{{public_path('uploads/' . $data['employee']->files->file_photo)}}" alt="" width="75">
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="main">
            <img class="background-image" src="{{public_path('images/idcard.jpg')}}" alt="">
            <div class="main-data">
                <div style="display: block;padding-top:40px;" class="back-div">
                    <p class="" style="font-size: 11px; line-height: 50%;">If found please return to the Register's
                        Office.</p>
                    <p class="" style="color: blue; line-height: 40%;text-align:center;padding-bottom:40px;">Indosat Ooredo</p>
                    <div style="position:absolute; display: block;">
                        <div style="display: block; margin-bottom: 4px;">
                            <div style="display: inline-block; background: #e53e3e; padding: 6px;">
                                <img src="{{public_path('images/home.png')}}" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 3px 5px; ">
                                Jl. Medan Merdeka Barat No. 21, Jakarta Pusat, Indonesia.
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 4px;">
                            <div style="display: inline-block; background: #63b3ed; padding: 6px;">
                                <img src="{{public_path('images/call-white.png')}}" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 3px 5px; ">
                                (021) 30003001 <br>
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 4px;">
                            <div style="display: inline-block; background: #4b1157; padding: 6px;">
                                <img src="{{public_path('images/global.png')}}" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 9px 5px; ">
                                https://indosatooredoo.com
                            </div>
                        </div>
                        <div style="display: block; margin-bottom: 4px;">
                            <div style="display: inline-block; background: #718096; padding: 6px;">
                                <img src="{{public_path('images/email.png')}}" style="width: 18px;" alt="">
                            </div>
                            <div
                                style="display: inline-block; background: #e2e8f0; width: 150px; font-size:10px; padding: 9px 5px; ">
                                info.business@indosatooredoo.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
