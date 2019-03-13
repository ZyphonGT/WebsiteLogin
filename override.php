<!doctype html>
<html lang="en">
  <head>
	<title>Request Overriding</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
  </head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"><link rel="stylesheet" href="style/override.css">
  <link rel="stylesheet" href="style/navbar.css">

  <body>
    <!--
    <div class="row">
      <div class="col">
        <?php include("navbar.php"); ?>
      </div>
    </div>
    -->
    
	  <div class="container">

			<div class="row">
		
				<div class="col">

					<div class="text-container row">
            <div class="col">
						  <h1 class="title">Override</h1>
						  <h5 class="subtitle">Please override these transactions.</h5>
            </div>
					</div>

          <!--
          <div class="row">
            <div class="form-group form-group-sm">
              <div class="col">
                <small id="helpId" class="form-text text-muted">Transaction ID</small>
                <input type="text" class="form-control form-control-sm" name="trxId" id="trxId" aria-describedby="helpId" placeholder="" disabled>
              </div>
            </div>
          </div>
          -->

          <div class="form-group form-group-sm">
              <small id="helpId" class="form-text text-muted">Transaction ID</small>
              <input type="text" class="form-control form-control-sm" name="trxId" id="trxId" aria-describedby="helpId" placeholder="" disabled>
            </div>    

            <div class="form-group form-group-sm">
              <small id="helpId" class="form-text text-muted">Account ID</small>
              <input type="text" class="form-control form-control-sm" name="accId" id="userId" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <div class="form-group form-group-sm">
              <small id="helpId" class="form-text text-muted">Account Name</small>
              <input type="text" class="form-control form-control-sm" name="accName" id="userName" aria-describedby="helpId" placeholder="" disabled>
            </div>   
          
					

          <div class="row" id="amountRow">
              <div class="col">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text" name="currency" id="currency">IDR</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Amount" id="amount" name="amount" disabled>
                </div>
              </div>
            </div>
          
          <div class="form-group form-group-sm row">
            <div class="col">
              <small id="helpId" class="form-text text-muted">Teller ID</small>
              <input type="text" class="form-control form-control-sm" name="tlrId" id="tlrId" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <div class="col">
              <small id="helpId" class="form-text text-muted">Teller Name</small>
              <input type="text" class="form-control form-control-sm" name="tlrName" id="tlrName" aria-describedby="helpId" placeholder="" disabled>
            </div>
          </div>

          <div class="form-group form-group-sm row">
            <div class="col">
              <small id="helpId" class="form-text text-muted">Record Number</small>
              <input type="text" class="form-control form-control-sm" name="numRecord" id="numRecord" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <div class="col">
              <small id="helpId" class="form-text text-muted">Account Balance</small>
              <input type="text" class="form-control form-control-sm" name="bal" id="bal" aria-describedby="helpId" placeholder="" disabled>
            </div>
          </div>
          
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="desc" id="desc" rows="2" disabled></textarea>
          </div>

      <div class="row">
        <div class="col">
          <div class="alert alert-success" role="alert" id="capture-success">
            Request has been successfully approved! Yay!
          </div>
          <div class="alert alert-danger" role="alert" id="capture-failed">
            Invalid fingerprint authentication. Oh no!
          </div>
          <div class="alert alert-warning" role="alert" id="capture-timeout">
            Authentication timeout!
          </div>
          <div class="alert alert-dark" role="alert" id="capture-unplugged">
            Please connect the fingerprint device into the computer.
          </div>

          <div class="btnlist">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#waitSpv" id="apv">Approve</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#waitSpv" id="rjt">Reject</button>

          </div>
        </div>
      </div>

      

				</div> <!-- end of row -->
                
			</div>
		
		</div>

    <!-- Modal -->
<div class="modal fade" id="waitSpv" tabindex="-1" role="dialog" aria-labelledby="waitSpvLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="waitSpvlLabel">Waiting for Fingerprint Identification Response</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body center">
        <div class="loader"></div>
        <p class="lead text-center">
          Please wait while the fingerprint capture engine is initiating.
        </p>
        </div>
      <div class="modal-footer"><!--
		    <div class="progress mr-auto" id="submit_progress" style="width:82.5%">
		      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="load" style="width:0%;">
			      0%
		    </div>
        -->
      <div class="progress mr-auto" id="submit_progress" style="width:80%;">
        <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%" id="load">100%</div>
      </div>  
        <button type="button" class="btn btn-secondary" id="close-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- Optional JavaScript -->
  <script>
    $(document).ready(function(){

      $(".alert").css("display","none");

        $("#apv").click(function(){

          $.post("withdrawal.php",{
            trxID: 1,
            apvFlag:1
          },
          function(data,status,xhr){
            if(status=="success"){
              $("#capture-success").show();
            }
            if(status=="error"){
              $("#capture-failed").show();
            }
          });
        });

        $("#rjt").click(function(){

          $.post("withdrawal.php",{
            trxID: 1,
            apvFlag:0
          },
          function(data,status,xhr){
            if(status=="success"){
              $("#capture-success").show();
            }
            if(status=="error"){
              $("#capture-failed").show();
            }
          });

        });
        
  

    });
  </script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/override.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>