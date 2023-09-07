<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('Pendaftaran', 'Pendaftaran') }}</title>
</head>
<body>
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td class="esd-email-paddings" valign="top">
                <table class="es-content esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="esd-stripe" align="center">
                            <table class="es-content-body" style="background-color: #ffffff;" width="560" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                <tbody>
                                    <tr>
                                        <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="es-m-p0r es-m-p20b esd-container-frame" width="520" valign="top" align="center">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="esd-block-image es-p20t es-p20r es-m-p0r" style="font-size: 0px;"><img src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_453/https://hexaintegra.com/wp-content/uploads/2020/12/logo_hexa.png" alt="hexa" style="display: block;" title="hexa" height="70"></td>
                                                            </tr>
                                                            <br>
                                                            <tr>
                                                                <td align="center" class="esd-block-text es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                    <h1 style="text-transform: uppercase;">Verifikasi Berhasil</h1>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="esd-block-text es-p20t es-p10b">
                                                                    <p>Hallo <b class="uppercase">{{$data['nama']}}</b><br><br></p>
                                                                    <p>Verifikasi data anda telah berhasil !</p>
                                                                        <p>Klik disini untuk mengisi Data lengkap peserta didik baru</p>
                                                                        <a href="http://127.0.0.1:8000/formpendaftaran3/{{{ $data['id'] }}}">
                                                                            <button  style="width: 80px;
                                                                                            border-radius: 5px;
                                                                                            padding: 10px;
                                                                                            color: #fff;
                                                                                            background-color: #0062cc;
                                                                                            border: none;
                                                                                            cursor: pointer;"> Klik Disini 
                                                                            </button> 
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
</body>
</html>