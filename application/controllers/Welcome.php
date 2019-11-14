<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
require APPPATH . '/libraries/BaseController.php';
class Welcome extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->load->model('Model_default');
    }
	
	public function index(){
		$this->load->view('welcome_page');
	}

	//generate pdf file.
	public function mpdf()	{
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('html_to_pdf',[],true);
		$mpdf->WriteHTML($html);
		//this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
		$mpdf->Output(); // opens in browser
		//$mpdf->Output($pdfFilePath,'D'); // it downloads the file into the user system, with give name
	}

	//paytm payment gateway integration
	public function paytm(){
	  	$this->load->view('paytm/TxnTest');
	}
	
	public function paytmpost(){
		extract($_REQUEST);
		print_r($_REQUEST);
		header("Pragma: no-cache");
	 	header("Cache-Control: no-cache");
	 	header("Expires: 0");
	 	// following files need to be include for paytm
		require_once(APPPATH . "/third_party/paytmlib/lib/config_paytm.php");
		require_once(APPPATH . "/third_party/paytmlib/lib/encdec_paytm.php");
		$checkSum = "";
		$paramList = array();

		$ORDER_ID = $_POST["ORDER_ID"];
		$CUST_ID = $_POST["CUST_ID"];
		$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
		$CHANNEL_ID = $_POST["CHANNEL_ID"];
		$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
		$MID 		=	$_POST['PAYTM_MERCHANT_MID'];
		$callBakcUrl = base_url('paytm/pgresponse');

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = $MID;
		$paramList["ORDER_ID"] = $ORDER_ID;
		$paramList["CUST_ID"] = $CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = 'WEBSTAGING';
		$paramList["CALLBACK_URL"] = $callBakcUrl;
		
		/*
		$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
		$paramList["EMAIL"] = $EMAIL; //Email ID of customer
		$paramList["VERIFIED_BY"] = "EMAIL"; //
		$paramList["IS_USER_VERIFIED"] = "YES"; //
		*/
		$url_link = 'https://securegw-stage.paytm.in/theia/processTransaction';
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,);
		//exit;
		echo "<html>
					<head>
						<title>Merchant Check Out Page</title>
					</head>
					<body>
				    	<center><h1>Please do not refresh this page...</h1></center>
				        <form method='post' action='".$url_link."' name='f1'>
							<table border='1'>
								<tbody>";
					 				foreach($paramList as $name => $value) {
				 						echo '<input type="hidden" name="'. $name .'" value="'.$value .'">';
				 					}
				 					echo "<input type='hidden' name='CHECKSUMHASH' value='". $checkSum . "'>
				 				</tbody>
							</table>
							<script type='text/javascript'>
							 	document.f1.submit();
							</script>
						</form>
					</body>
				</html>";
 	}

 	//paytm responce
 	function pgResponse()
    {
        
        
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        
        $paramList = $_POST;
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        
        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList,'EwV#EN%kY1cKCHxi', $paytmChecksum); //will return TRUE or FALSE string.
        
        
        if($isValidChecksum == "TRUE") {
           // echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
        if ($_POST["STATUS"] == "TXN_SUCCESS") {
            
           $paymentStatus= "<b> success </b>" . "<br/>";

           //Process your transaction here as success transaction.
           //Verify amount & order id received from Payment gateway with your application's order id and amount.
           
           
        }
        else {
           $paymentStatus= "<b>failure</b>" . "<br/>";
        }
        
        $paymentData =array();
        
        if (isset($_POST) && count($_POST)>0 )
        { 
            
            foreach($_POST as $paramName => $paramValue) {
                   $paymentData[$paramName]=$paramValue;
            	//	echo "<br/>" . $paramName . " = " . $paramValue;
            }
            
             if ($_POST["STATUS"] == "TXN_SUCCESS") {
                 
                 
                 $userCode = $this->session->userdata('userCCode');
                 
                 
                 
                 if (isset($_POST["ORDERID"]) && $_POST["ORDERID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDERID"];
		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}
                 
       // echo json_encode($responseParamList);          
      
                 
                 
                 
                 
                 
                 if ($responseParamList["STATUS"] == "TXN_SUCCESS") {
                 
                 
                 $insertdata = array(
                     "orderId"=>$_POST["ORDERID"],
                     "transactionId"=>$_POST["TXNID"],
                     "bankTxnId"=>$_POST["BANKTXNID"],
                     "userId"=>$userCode,
                     "amount"=>$_POST["TXNAMOUNT"],
                     "paymentStatus"=>1,
                     "paymentDate"=>$_POST["TXNDATE"]
                );
                
                $result = $this->Adminmodel->insertRecord('recharge_amount',$insertdata);
                $prevAmount = $this->Adminmodel->getSingleColumnName($userCode,'user_id','totalAmount','user_wallet');     
                $newTotal=$prevAmount+(int)$_POST["TXNAMOUNT"];
                $insertdataWallert = array(
                     "transactionType"=>1,
                     "user_id"=>$userCode,
                     "amount"=>$_POST["TXNAMOUNT"],
                     "totalAmount"=>$newTotal,
                     "created_at"=>$_POST["TXNDATE"]
                );
                $result22 = $this->Adminmodel->insertRecord('user_wallet',$insertdataWallert);
                     
             }else{
                 $paymentStatus ="<b> failure</b>";
             }
            
             }
            
        }
        
        
        }
        else {
       $paymentStatus ="<b> failure</b>";
        //Process transaction as suspicious.
        }
        $data['paymentStatus']=$paymentStatus;
        $data['paymentData']=$paymentData;
        $this->load->view('paytm/paytmResponse',$data);
        
    }	
}
