<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">
    <style>
@media only screen and (max-width: 425px) {
  .content {
    padding: 10% 3%;
    overflow: hidden;
  }

  .content .ctn-body .ctn-table-50 .ctn-right {
    padding: 0;
  }

  .content .ctn-body .ctn-table-50 .ctn-right>table {
    background-color: #F5F4F8;
    padding: 2% 3%;
  }

  .w-sm-100 {
    width: 100% !important;
  }

  .sm-block {
    display: block !important;
  }

  .sm-none {
    display: none !important;
  }
}
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" offset="0" style="margin: 0;">
    <!-- background table -->
    <table id="bgtable" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tr>
            <td valign="top">


                <div class="content" style="max-width: 650px; padding: 10% 5%; margin-left: auto; margin-right: auto; overflow: hidden; font-family: 'Arimo', sans-serif;">

                    <div class="ctn-head">
                        <h3 style="font-size: 28px; font-weight: 800; line-height: 36px; margin: 0; color: #0075B5;">Selamat Datang,</h3>
                        <p style="margin-bottom: 0; font-size: 18px; margin-top: 10px; color: #00ADC6;">#ELLKTIM</p>
                    </div>

                    <div class="ctn-divider" style="margin: 30px 0; width: 100%; height: 1px; background-color: #CCC;"></div>

                    <div class="ctn-body" style="color: #3A3F4F;">

                        <p class="text-bold" style="margin-bottom: 0; margin-top: 0; font-style: normal; font-weight: bold; font-size: 15px; line-height: 24px;">
                            Halo {{ $name }}!
                        </p>

                        <p class="text-normal m-t-20" style="margin-bottom: 0; font-style: normal; font-weight: normal; font-size: 15px; line-height: 24px; margin-top: 20px;">
                            Selamat Datang, email anda sudah berhasil didaftarkan untuk mengakses dashboard ellk.
                        </p>



                        <p class="text-normal m-t-10" style="margin-bottom: 0; font-style: normal; font-weight: normal; font-size: 15px; line-height: 24px; margin-top: 10px;">
                            Berikut user akses ke Dashboard ELLK :
                        </p>

                        <div class="ctn-table-50 m-t-30" style="margin-top: 30px; position: relative; background-color: #f5f4f8; overflow: hidden;">
                            <div class="w-60 w-sm-100 ctn-right" style="width: 100%; background-color: #F5F4F8; padding: 0% 2% 2% 2%; display: inline-block;">
                                <table class="" cellpadding="0" cellspacing="0" style="border: 0; display: table; width: 100%;" width="100%">
                                    <tr>
                                        <td>
                                            <table class="w-100 m-t-20" cellpadding="0" cellspacing="0" style="margin-top: 20px; border: 0; display: table; width: 100%;" width="100%">
                                                <tr>
                                                    <td class="w-30 text-normal" style="font-style: normal; font-weight: normal; font-size: 15px; line-height: 24px; width: 30%;" width="30%">Email</td>
                                                    <td class="w-70 text-bold" style="font-style: normal; font-weight: bold; font-size: 15px; line-height: 24px; width: 70%;" width="70%">{{ $email }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-30 text-normal" style="font-style: normal; font-weight: normal; font-size: 15px; line-height: 24px; width: 30%;" width="30%">Password</td>
                                                    <td class="w-70 text-bold" style="font-style: normal; font-weight: bold; font-size: 15px; line-height: 24px; width: 70%;" width="70%">{{ $password }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <p class="text-normal m-t-20" style="margin-bottom: 0; font-style: normal; font-weight: normal; font-size: 15px; line-height: 24px; margin-top: 20px;">
                            Salam hangat, <br> <br>
                            Tim ELLK
                        </p>
                    </div>
                    <!-- container 650px -->
            </div></td>
        </tr>
    </table>
    <!-- background table -->

</body>

</html>