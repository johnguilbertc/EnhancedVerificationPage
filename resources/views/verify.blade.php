<html>

<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<title>Enhanced Labs Product Verification</title>

</head>

<body>
<!-- resources/views/verify.blade.php -->

<div class="container-fluid">
	<div class="row" style="max-width: 1280px; margin:0 auto;">
		<div class="col-md-12">
    <img src="{{ asset('/images/logo.png') }}" class="align-items-center">
        @if(session('success'))
            <div class="alert alert-success"> {!! nl2br(e(session('success'))) !!} </div>
        @elseif(session('error'))
            <div class="alert alert-danger">{!! nl2br(e(session('error'))) !!}</div>
        @endif

        <form method="POST" action="{{ route('verify.check') }}">
            @csrf
            <div class="mb-3">
                <label for="serial_number" class="form-label">Serial Number:</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
   
		    </div>
	</div>




    <div class="container-fluid">
	<div class="row" style="max-width: 1280px; margin:0 auto;">
		<div class="col-md-4">
			<h2>
            Genuine Product
			</h2>
			<p>
            Congratulations! Your product is authentic, confirming that you have invested in a legitimate Enhanced Labs supplement. You can rest assured knowing that you're consuming the highest quality formulas to fuel your fitness journey.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
            Genuine Product, Previously Verified
			</h2>
			<p>
			While your product is genuine, the code you entered has already been used on a specific date. This outcome suggests that someone else has previously verified the product's authenticity. Please note that this doesn't indicate any issue with the product itself; it merely means that the code has been utilized before, But An issue Could Be Present. 	
            </p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
            Code Not Genuine
			</h2>
			<p>
            Unfortunately, the code you entered does not match our database records, suggesting that the product may be counterfeit. We highly encourage you to exercise caution in such cases and reach out to our customer support immediately. We will investigate the matter promptly to ensure your satisfaction.		
        </p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
	</div>
</div>
   

</div>





</body>

</html>