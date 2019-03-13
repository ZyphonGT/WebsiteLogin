<!doctype html>
<html lang="en">
  <head>
	<title>Withdrawal Form</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
  </head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style/withdrawal.css">
  <body>
	  <div class="container">
		
			<div class="row">
		
				<div class="col">

					<div class="text-container">
						<h1 class="title">Withdrawal Form</h1>
						<h5 class="subtitle">Please complete the withdrawal form.</h5>
					</div>

					<form method="POST" action="do_withdraw.php">
		
            <div class="form-group">
              <small id="helpId" class="form-text text-muted">Transaction ID</small>
              <input type="text" class="form-control form-control-sm" name="trxId" id="trxId" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <div class="form-group">
              <small id="helpId" class="form-text text-muted">Account Number</small>
              <input type="text" class="form-control form-control-sm" name="accnum" id="accnum" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
              <small id="helpId" class="form-text text-muted">Account Name</small>
              <input type="text" class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <!--
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle currency" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="currency">Currency</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">IDR</a>
                    <a class="dropdown-item" href="#">AUD</a>
                    <a class="dropdown-item" href="#">USD</a>
                    </div>
                </div>
                <input type="text" class="form-control form-control-sm" aria-label="Text input with dropdown button" id="amount" name="amount">
            </div>
            -->

            <div class="row" id="amountRow">
              <div class="col">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text" name="currency" id="currency">IDR</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Amount" id="amount" name="amount">
                </div>
              </div>
            </div>

            <div class="form-group">
              <small id="helpId" class="form-text text-muted">Amount in Words</small>
              <input type="text" class="form-control form-control-sm" name="amountWord" id="amountWord" aria-describedby="helpId" placeholder="" disabled>
            </div>      

            <div class="form-group">
              <small id="helpId" class="form-text text-muted">Balance</small>
              <input type="text" class="form-control form-control-sm" name="bal" id="bal" aria-describedby="helpId" placeholder="" disabled>
            </div>

            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="desc" id="desc" rows="2"></textarea>
            </div>        

            <div class="alert alert-success d-none" role="alert" id="capture-success">
            Request has been successfully approved! Yay!
            </div>
            <div class="alert alert-danger d-none" role="alert" id="capture-failed">
              Invalid fingerprint authentication. Oh no!
            </div>
            <div class="alert alert-warning d-none" role="alert" id="capture-timeout">
              Authentication timeout!
            </div>
            <div class="alert alert-dark d-none" role="alert" id="capture-unplugged">
              Please connect the fingerprint device into the computer.
            </div>
					  <button type="submit" class="btn btn-primary" id="submit" name="submit">Print</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#waitSpv">
              Launch demo modal
            </button>
					</form>

				</div>
		
			</div>
		
    </div>
    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="waitSpv" tabindex="-1" role="dialog" aria-labelledby="waitSpvLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="waitSpvlLabel">Waiting for Supervisor Authorization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body center">
        <div class="loader"></div>
        <p class="lead text-center">
          Please wait while we are waiting for supervisor's response.
        </p>
        </div>
      <div class="modal-footer"><!--
		    <div class="progress mr-auto" id="submit_progress" style="width:82.5%">
		      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="load" style="width:0%;">
			      0%
		    </div>
        -->
        <button type="button" class="btn btn-secondary" id="close-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="js/withdrawal.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>