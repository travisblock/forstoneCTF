<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password | ForstoneCTF</title>
    <meta name="description" content="Lupa kata sandi | ForstoneCTF">
    <meta name="author" content="FORSTONE">
    <meta name="keywords" content="Forstone, TKJ, Web TKJ" />
    <meta name="language" content="indonesia">
    <link rel="shortcut icon" href="/img/logo.png">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../../admin/home/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../admin/home/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../admin/home/css/font.css">
    <link rel="stylesheet" href="../../admin/home/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../../admin/home/css/custom.css">
    <link rel="shortcut icon" href="/img/logo.png">
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">            
            <div class="col-lg-5 bg-white align-items-center">
              <div class="form d-flex align-items-center">              
                <div class="content">
	             <?php
	            if($_SERVER['REQUEST_METHOD'] == 'POST'){
	                include "../admin@yusuf32/config.php";
	                $lama = 1;
	                $hapus_yang_sudah = mysqli_query($con, "DELETE FROM tbl_reset WHERE DATEDIFF(CURDATE(), tgl) > $lama ");
	                
	                $usrn 	= aman($_POST['username']);
	                $email 	= aman($_POST['email']);
	                $sql 	= mysqli_query($con, "SELECT * FROM user where usrname='$usrn' AND email='$email'");
	                $ada 	= mysqli_num_rows($sql);
	                $data 	= mysqli_fetch_array($sql);
	                
	                //cek apakah sudah 3x reset pass
	                $id_user_fix    = $data['id'];
                    $query_cek_data = mysqli_query($con, "SELECT * from tbl_reset where id_user = '$id_user_fix' ");
                    $fetch_datanya  = mysqli_fetch_array($query_cek_data);
                    $jumlah_reset   = $fetch_datanya['jml'];
                    if($jumlah_reset >= 3){
                        
                        echo "<div class='alert alert-danger'><strong>Gagal: </strong>Kamu sudah 3x reset, coba besok lagi</div>";
                        
                    }

	                $usermu = $data['usrname'];
	                $emailu = $data['email'];
	                $paswot = $data['password'];
	                if($jumlah_reset <= 3){
	                if($ada > 0 ){
	                    
	                	$code = uniqid(true);
						$codx = md5($code);
						$id   = intval($data['id']);
						$query = mysqli_query($con, "UPDATE user set code='$codx' where id='$id'");
						
						
	                	require 'PHPMailer/PHPMailerAutoload.php';
						$mail = new PHPMailer;


                        //catet data dan record ke db
                        $tgll = date("Y-m-d");
                        $jml = 1;
                        $select_dulu    = mysqli_query($con, "SELECT * FROM tbl_reset WHERE id_user='$id' ");
                        $cek_datanya    = mysqli_num_rows($select_dulu);
                        if($cek_datanya > 0){
                            
					        $tambahkan      = mysqli_query($con, "UPDATE tbl_reset SET jml=jml+1 where id_user='$id' ");
                            
                        }else{
					     $query_lebokno  = mysqli_query($con, "INSERT INTO tbl_reset(id_user,jml,tgl) VALUES('$id', '$jml', '$tgll')");
                        }
					    
						// Konfigurasi SMTP
						$mail->isSMTP();
						$mail->Host = 'mail.forstone.web.id';
						$mail->SMTPAuth = true;
						$mail->Username = 'ajid@forstone.web.id';
						$mail->Password = 'ajidganteng1337';
						$mail->SMTPSecure = 'tls';
						$mail->Port = 587;

						$mail->setFrom('ajid@forstone.web.id', 'ForstoneCTF');
						$mail->addReplyTo('ajid@forstone.web.id', 'ForstoneCTF');

						// Menambahkan penerima
						$mail->addAddress("$email");
						
						// Subjek email
						$mail->Subject = 'Forgot Password - ForstoneCTF';

						// Mengatur format email ke HTML
						$mail->isHTML(true);

						// Konten/isi email
						$mailContent = "
            <!doctype html>
            <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
              <head>
                <!-- NAME: SIMPLE TEXT -->
                <!--[if gte mso 15]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
                <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                <title>Reset Password</title>
                    
                <style type='text/css'>
                p{
                  margin:10px 0;
                  padding:0;
                }
                table{
                  border-collapse:collapse;
                }
                h1,h2,h3,h4,h5,h6{
                  display:block;
                  margin:0;
                  padding:0;
                }
                img,a img{
                  border:0;
                  height:auto;
                  outline:none;
                  text-decoration:none;
                }
                body,#bodyTable,#bodyCell{
                  height:100%;
                  margin:0;
                  padding:0;
                  width:100%;
                }
                .mcnPreviewText{
                  display:none !important;
                }
                #outlook a{
                  padding:0;
                }
                img{
                  -ms-interpolation-mode:bicubic;
                }
                table{
                  mso-table-lspace:0pt;
                  mso-table-rspace:0pt;
                }
                .ReadMsgBody{
                  width:100%;
                }
                .ExternalClass{
                  width:100%;
                }
                p,a,li,td,blockquote{
                  mso-line-height-rule:exactly;
                }
                a[href^=tel],a[href^=sms]{
                  color:inherit;
                  cursor:default;
                  text-decoration:none;
                }
                p,a,li,td,body,table,blockquote{
                  -ms-text-size-adjust:100%;
                  -webkit-text-size-adjust:100%;
                }
                .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
                  line-height:100%;
                }
                a[x-apple-data-detectors]{
                  color:inherit !important;
                  text-decoration:none !important;
                  font-size:inherit !important;
                  font-family:inherit !important;
                  font-weight:inherit !important;
                  line-height:inherit !important;
                }
                #bodyCell{
                  padding:10px;
                }
                .templateContainer{
                  max-width:600px !important;
                }
                a.mcnButton{
                  display:block;
                }
                .mcnImage{
                  vertical-align:bottom;
                }
                .mcnTextContent{
                  word-break:break-word;
                }
                .mcnTextContent img{
                  height:auto !important;
                }
                .mcnDividerBlock{
                  table-layout:fixed !important;
                }
              /*
              @tab Page
              @section Background Style
              @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
              */
                body,#bodyTable{
                  /*@editable*/background-color:#f5f2f2;
                  /*@editable*/background-image:none;
                  /*@editable*/background-repeat:no-repeat;
                  /*@editable*/background-position:center;
                  /*@editable*/background-size:cover;
                }
              /*
              @tab Page
              @section Background Style
              @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
              */
                #bodyCell{
                  /*@editable*/border-top:0;
                }
              /*
              @tab Page
              @section Email Border
              @tip Set the border for your email.
              */
                .templateContainer{
                  /*@editable*/border:0;
                }
              /*
              @tab Page
              @section Heading 1
              @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
              @style heading 1
              */
                h1{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:26px;
                  /*@editable*/font-style:normal;
                  /*@editable*/font-weight:bold;
                  /*@editable*/line-height:125%;
                  /*@editable*/letter-spacing:normal;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Page
              @section Heading 2
              @tip Set the styling for all second-level headings in your emails.
              @style heading 2
              */
                h2{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:22px;
                  /*@editable*/font-style:normal;
                  /*@editable*/font-weight:bold;
                  /*@editable*/line-height:125%;
                  /*@editable*/letter-spacing:normal;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Page
              @section Heading 3
              @tip Set the styling for all third-level headings in your emails.
              @style heading 3
              */
                h3{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:20px;
                  /*@editable*/font-style:normal;
                  /*@editable*/font-weight:bold;
                  /*@editable*/line-height:125%;
                  /*@editable*/letter-spacing:normal;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Page
              @section Heading 4
              @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
              @style heading 4
              */
                h4{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:18px;
                  /*@editable*/font-style:normal;
                  /*@editable*/font-weight:bold;
                  /*@editable*/line-height:125%;
                  /*@editable*/letter-spacing:normal;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Header
              @section Header Style
              @tip Set the borders for your email's header area.
              */
                #templateHeader{
                  /*@editable*/border-top:0;
                  /*@editable*/border-bottom:0;
                }
              /*
              @tab Header
              @section Header Text
              @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
              */
                #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:16px;
                  /*@editable*/line-height:150%;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Header
              @section Header Link
              @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
              */
                #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
                  /*@editable*/color:#2BAADF;
                  /*@editable*/font-weight:normal;
                  /*@editable*/text-decoration:underline;
                }
              /*
              @tab Body
              @section Body Style
              @tip Set the borders for your email's body area.
              */
                #templateBody{
                  /*@editable*/border-top:0;
                  /*@editable*/border-bottom:0;
                }
              /*
              @tab Body
              @section Body Text
              @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
              */
                #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:16px;
                  /*@editable*/line-height:150%;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Body
              @section Body Link
              @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
              */
                #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
                  /*@editable*/color:#2BAADF;
                  /*@editable*/font-weight:normal;
                  /*@editable*/text-decoration:underline;
                }
              /*
              @tab Footer
              @section Footer Style
              @tip Set the borders for your email's footer area.
              */
                #templateFooter{
                  /*@editable*/border-top:0;
                  /*@editable*/border-bottom:0;
                }
              /*
              @tab Footer
              @section Footer Text
              @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
              */
                #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
                  /*@editable*/color:#202020;
                  /*@editable*/font-family:Helvetica;
                  /*@editable*/font-size:12px;
                  /*@editable*/line-height:150%;
                  /*@editable*/text-align:left;
                }
              /*
              @tab Footer
              @section Footer Link
              @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
              */
                #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
                  /*@editable*/color:#b90000;
                  /*@editable*/font-weight:normal;
                  /*@editable*/text-decoration:underline;
                }
              @media only screen and (min-width:768px){
                .templateContainer{
                  width:600px !important;
                }

            } @media only screen and (max-width: 480px){
                body,table,td,p,a,li,blockquote{
                  -webkit-text-size-adjust:none !important;
                }

            } @media only screen and (max-width: 480px){
                body{
                  width:100% !important;
                  min-width:100% !important;
                }

            } @media only screen and (max-width: 480px){
                #bodyCell{
                  padding-top:10px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImage{
                  width:100% !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
                  max-width:100% !important;
                  width:100% !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnBoxedTextContentContainer{
                  min-width:100% !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageGroupContent{
                  padding:9px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
                  padding-top:9px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
                  padding-top:18px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageCardBottomImageContent{
                  padding-bottom:9px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageGroupBlockInner{
                  padding-top:0 !important;
                  padding-bottom:0 !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageGroupBlockOuter{
                  padding-top:9px !important;
                  padding-bottom:9px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnTextContent,.mcnBoxedTextContentColumn{
                  padding-right:18px !important;
                  padding-left:18px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
                  padding-right:18px !important;
                  padding-bottom:0 !important;
                  padding-left:18px !important;
                }

            } @media only screen and (max-width: 480px){
                .mcpreview-image-uploader{
                  display:none !important;
                  width:100% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Heading 1
              @tip Make the first-level headings larger in size for better readability on small screens.
              */
                h1{
                  /*@editable*/font-size:22px !important;
                  /*@editable*/line-height:125% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Heading 2
              @tip Make the second-level headings larger in size for better readability on small screens.
              */
                h2{
                  /*@editable*/font-size:20px !important;
                  /*@editable*/line-height:125% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Heading 3
              @tip Make the third-level headings larger in size for better readability on small screens.
              */
                h3{
                  /*@editable*/font-size:18px !important;
                  /*@editable*/line-height:125% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Heading 4
              @tip Make the fourth-level headings larger in size for better readability on small screens.
              */
                h4{
                  /*@editable*/font-size:16px !important;
                  /*@editable*/line-height:150% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Boxed Text
              @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
              */
                table.mcnBoxedTextContentContainer td.mcnTextContent,td.mcnBoxedTextContentContainer td.mcnTextContent p{
                  /*@editable*/font-size:14px !important;
                  /*@editable*/line-height:150% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Header Text
              @tip Make the header text larger in size for better readability on small screens.
              */
                td#templateHeader td.mcnTextContent,td#templateHeader td.mcnTextContent p{
                  /*@editable*/font-size:16px !important;
                  /*@editable*/line-height:150% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Body Text
              @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
              */
                td#templateBody td.mcnTextContent,td#templateBody td.mcnTextContent p{
                  /*@editable*/font-size:16px !important;
                  /*@editable*/line-height:150% !important;
                }

            } @media only screen and (max-width: 480px){
              /*
              @tab Mobile Styles
              @section Footer Text
              @tip Make the footer content text larger in size for better readability on small screens.
              */
                td#templateFooter td.mcnTextContent,td#templateFooter td.mcnTextContent p{
                  /*@editable*/font-size:14px !important;
                  /*@editable*/line-height:150% !important;
                }

            }</style></head>
                <body>
              
                    <center>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable'>
                            <tr>
                                <td align='left' valign='top' id='bodyCell'>
                                    <!-- BEGIN TEMPLATE // -->
                        <!--[if gte mso 9]>
                        <table align='center' border='0' cellspacing='0' cellpadding='0' width='600' style='width:600px;'>
                        <tr>
                        <td align='center' valign='top' width='600' style='width:600px;'>
                        <![endif]-->
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' class='templateContainer'>
                                        <tr>
                                            <td valign='top' id='templateHeader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
                <tbody class='mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
                            <!--[if mso]>
                    <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
                    <tr>
                    <![endif]-->
                      
                    <!--[if mso]>
                    <td valign='top' width='600' style='width:600px;'>
                    <![endif]-->
                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                                <tbody><tr>
                                    
                                    <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                                    
                                        <font style='font-size: 40px;font-style: italic;font-weight: bold;font-family: Verdana,geneva,sans-serif;color: #003366;'>Forstone</font>
            <font style='font-size: 40px;font-style: italic;font-weight: bold;font-family: Verdana,geneva,sans-serif;color: #009cde;'>CTF</font>
                                    </td>
                                </tr>
                            </tbody></table>
                    <!--[if mso]>
                    </td>
                    <![endif]-->
                            
                    <!--[if mso]>
                    </tr>
                    </table>
                    <![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign='top' id='templateBody'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
                <tbody class='mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
                            <!--[if mso]>
                    <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
                    <tr>
                    <![endif]-->
                      
                    <!--[if mso]>
                    <td valign='top' width='600' style='width:600px;'>
                    <![endif]-->
                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                                <tbody><tr>
                                    
                                    <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                                    
                                        <span style='font-size:16px'><span style='font-family:verdana,geneva,sans-serif'>Anda lupa password ya &nbsp;</span></span><br>
            &nbsp;
                                    </td>
                                </tr>
                            </tbody></table>
                    <!--[if mso]>
                    </td>
                    <![endif]-->
                            
                    <!--[if mso]>
                    </tr>
                    </table>
                    <![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                        <tr>
                                            <td valign='top' id='templateFooter'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
                <tbody class='mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
                            <!--[if mso]>
                    <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
                    <tr>
                    <![endif]-->
                      
                    <!--[if mso]>
                    <td valign='top' width='600' style='width:600px;'>
                    <![endif]-->
                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                                <tbody><tr>
                                    
                                    <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                                    
                                        <ul>
              <li><span style='font-size:14px'><span style='font-family:verdana,geneva,sans-serif'>Username : $usermu </span></span></li>
              <li><span style='font-size:14px'><span style='font-family:verdana,geneva,sans-serif'>Email  : $email</span></span></li>
              
            </ul>

                                    </td>
                                </tr>
                            </tbody></table>
                    <!--[if mso]>
                    </td>
                    <![endif]-->
                            
                    <!--[if mso]>
                    </tr>
                    </table>
                    <![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='mcnTextBlock' style='min-width:100%;'>
                <tbody class='mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='mcnTextBlockInner' style='padding-top:9px;'>
                            <!--[if mso]>
                    <table align='left' border='0' cellspacing='0' cellpadding='0' width='100%' style='width:100%;'>
                    <tr>
                    <![endif]-->
                      
                    <!--[if mso]>
                    <td valign='top' width='600' style='width:600px;'>
                    <![endif]-->
                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%; min-width:100%;' width='100%' class='mcnTextContentContainer'>
                                <tbody><tr>
                                    
                                    <td valign='top' class='mcnTextContent' style='padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;'>
                                    
                                        <span style='font-size:14px'><span style='font-family:verdana,geneva,sans-serif'>&nbsp;To reset your password :<a href='http://forstone.web.id/ctf/user/reset_pass?kode=$codx ' target='_blank' title='Click Here '>Click Here</a></span></span>
                                    </td>
                                </tr>
                            </tbody></table>
                    <!--[if mso]>
                    </td>
                    <![endif]-->
                            
                    <!--[if mso]>
                    </tr>
                    </table>
                    <![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table></td>
                                        </tr>
                                    </table>
                        <!--[if gte mso 9]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                                    <!-- // END TEMPLATE -->
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>
            </html>
            ";
						$mail->Body = $mailContent;

						// Menambahakn lampiran
						//$mail->addAttachment('lmp/file1.pdf');
						//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

						// Kirim email
	                    
						if(!$mail->send()){
						    echo "<div class='alert alert-danger'><strong>Error: </strong> Pasan tidak terkirim $mail->ErrorInfo</div>";
						}else{
						    echo "<div class='alert alert-success'><strong>Success: </strong> Silahkan Cek Emailmu</div>";
						   
						}
	                	
	                }else{
	                	echo "<div class='alert alert-danger'><strong>Error: </strong> Username dan Email tidak di temukan</div>";
	                }
	               }//penutup if $jumlah_reset < 4
	            }

	            ?>
                  <form method="POST" class="form-validate">
                    <div class="form-group">
                      
                      <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="email" name="email" required data-msg="Please enter your email" class="input-material">
                      <label for="login-password" class="label-material">Email</label>
                    </div><input id="register" type="submit" value="Submit" class="btn btn-primary">
                  </form>
                  <br><small><a href="./">Login</a></small>
                </div>
              </div>
            </div>
            
            <div class="col-lg-5">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1><a href="/ctf" target="_blank">Forgot Passwd</a></h1>
                  </div>
                  <p>Lupa password</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="../../admin/home/vendor/jquery/jquery.min.js"></script>
    <script src="../../admin/home/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../../admin/home/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../admin/home/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../../admin/home/vendor/chart.js/Chart.min.js"></script>
    <script src="../../admin/home/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../admin/home/js/front.js"></script>


  <script>
      $(document).ready(function(){
        setTimeout(function(){$(".alert").fadeIn('slow');}, 150);});
        setTimeout(function(){$(".alert").fadeOut('slow');}, 10000);
  </script>
  </body>
</html>