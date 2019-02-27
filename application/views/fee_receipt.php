<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

     

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      

      
      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }

    </style>
  </head>
  <body class="">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
					<tr >
						<td style="width:100%;" colspan="2">
						 <p style="text-align:center"><img src="<?php echo base_url(); ?>assets/img/ThoresLogo.png" style="width: 158px;"></p>
                        <p style="text-align:center">1236 Santander St., Sampaloc Manila</p>
						</td>
					</tr>
                    <tr>
					  <td style="width: 20%;">
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
							  <tbody>
              <?php if($i == 1) { ?>
                <tr>
								  <td style="font-size: 12px;">
									Payment Method: 
								  </td>
								</tr>
								<tr>
								  <td style="font-size: 12px;text-indent: 10px;">
									Check 
								  </td>
								</tr>

                <tr>
								  <td style="font-size: 12px;">
									Check No: 
								  </td>
								</tr>
								<tr>
								  <td style="font-size: 12px;text-indent: 10px;">
									<?php echo $fcheck_no ; ?>
								  </td>
								</tr>

                <tr>
								  <td style="font-size: 12px;">
									Bank: 
								  </td>
								</tr>
								<tr>
								  <td style="font-size: 12px;text-indent: 10px;">
									<?php echo $fcheck_bank ; ?>
								  </td>
								</tr>

                <tr>
								  <td style="font-size: 12px;">
									Check Date: 
								  </td>
								</tr>
								<tr>
								  <td style="font-size: 12px;text-indent: 10px;">
									<?php echo $fcheck_date ; ?>
								  </td>
								</tr>



              <?php } else { ?>
								<tr>
								  <td style="font-size: 12px;">
									Payment Method: 
								  </td>
								</tr>
								<tr>
								  <td style="font-size: 12px;text-indent: 10px;">
									Cash 
								  </td>
								</tr>
              <?php } ?>

							  </tbody>
							</table>
					  </td>
                      <td style="width: 80%;">
                       
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #c7c7c7;padding-left:10px">
                          <tbody>
                            <tr>
                              <td style="width:50%; " >
                                Official Receipt
                              </td>
							  <td style="width:50%; text-align:right" >
								Receipt No: <?php echo $j; ?>
							  <td>
                            </tr>
							<tr>
                              <td >
                              </td>
							  <td style="width:50%; text-align:right; padding-top: 15px;">
								Date: <?php echo $d; ?>
							  <td>
                            </tr>
							
							<tr >
							  <td style="width:50%;text-indent:25px; text-align:justify;padding: 20px 15px;" colspan="2">
								Received from <b><?php echo $a." ".$b; ?></b>, Unit <b><?php echo $c;  ?></b> the amount of <b>Php <?php echo number_format($g, 2); ?></b> as <b>
                <?php if(isset($pay)) {
                    $pf = "" ;
                    
                    foreach($pay as $full) {
                      if($full['full'] == 1) {
                        $pf.= $full['type']." ";
                      }
                    }
                    if ($pf != "") {
                      echo " full payment for ".$pf;
                    }

                      $pm = "";
                      foreach($pay as $full) {
                        if($full['full'] == 0) {
                            $pm.= $full['type']." ";
                        }
                      }

                      if ($pm != "" && $pf != "") {
                      echo " and partial payment for ".$pm;
                    } else if ($pm != "" && $pf == "") {
                      echo "  partial payment for ".$pm;
                    }
                      
                } else {
                    if ($h == "advance") {
                        if ($advance_payment == 0) {
                            echo " partial ";
                        } else { 
                            echo "full";
                        } 
                        echo "Advance payment.";
                    } else if ($h == "deposit") {
                        if ($deposit_payment == 0) {
                            echo " partial ";
                        } else { 
                            echo "full ";
                        } 
                        echo "Deposit payment.";
                    }

                    
                }?> 
                         
                </b>
							  <td>
                            </tr>
							
						
							
							
                          </tbody>
                        </table>
                   
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
