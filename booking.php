
<?php
include("config/connect.php");
session_start();
include("config/session.php");
if(!internauteisconnected()){header("location:connexion.php");}
require_once('menu2.php');
$idmaison=$_GET['idmaison'];
$getmaison=$conn->query('SELECT * from maison,category where idmaison="'.$idmaison.'" and maison.idcat=category.idcat');
$show=$getmaison->fetch();


?>




<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Sent request </h1>
            <span class="color-text-a">Form</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            
              <li class="breadcrumb-item active" aria-current="page">
                Properties 
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</section>
  <!--/ Intro Single End /-->
<div class="container book">
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">tenants booking request form</h4>
								</div>
								<div class="card-body">
									<form method='POST' id="book">
										<h4 class="card-title">Personal Information</h4>
										<div class="row">
											<div class="col-md-6">
												
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" value="<?php echo $_SESSION['user']['nameoffreur'] ?>"readonly="readonly" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
											
												<div class="form-group">
													<label>Email</label>
													<input type="text"value="<?php echo $_SESSION['user']['emailoff'] ?>"readonly="readonly" class="form-control">
												</div>

												
											</div>
										</div>
										<h4 class="card-title">House info</h4>
										<div class="row">
											<div class="col-md-6">
											<div class="form-group">
													<label>House ID</label>
													<input type="text" name="idmaison" value="<?php echo $show['idmaison'] ?>"readonly="readonly" class="form-control">
												</div>
												<div class="form-group">
													<label>House type</label>
													<input type="text"  name="type"  value="<?php echo $show['namecat'] ?>"readonly="readonly" class="form-control">
												</div>
												<div class="form-group">
													<label>House title</label>
													<input type="text" name="title"  value="<?php echo $show['titre'] ?>"readonly="readonly" class="form-control">
												</div>
												
											</div>
											
											<div class="col-md-6">
											 
												<div class="form-group">
													<label>	Address</label>
													<input type="text" name="adress"  value="<?php echo $show['adress3'] ?>"readonly="readonly" class="form-control">
												</div>
												<div class="form-group">
													<label>Zone</label>
													<input type="text"name="zone"  value="<?php echo $show['adress2'] ?>"readonly="readonly" class="form-control">
												</div>
												<div class="form-group">
													<label>commune</label>
													<input type="text" name="commune"  value="<?php echo $show['adress1'] ?>" readonly="readonly" class="form-control">
													<input type="hidden" name="idowner" value="<?php echo $show['id']?>">
												</div>

												
											</div>
											
										</div>
										
										<h4 class="card-title">request details</h4>
										<div class="row">
										   
											<div  class="col-md-6">	
											    <label class="d-block">monthly rent :</label>	
											
												<div class="input-group">
												    
													<div class="input-group-prepend">
														<span class="input-group-text">FBU</span>
													</div>
													
													<input type="number" name="prix"  value="<?php echo $show['prix'] ?>"readonly="readonly" class="form-control">
												</div>
											
										    </div>
											<div  class="col-md-6">			
										        <div class="form-group">
											         <label class="d-block">Advance payment :</label>
											        <input type="number" name="months"  id="months" class="form-control">
											        <span class="form-text text-muted">type number of months you want to pay for the advance payment</span>
										
													
										        </div>
										    </div>
										   
                                        </div>
										<div class="row">
											
											<div class="col-md-6 mt-3">
											<label for="">type of activity</label>
												<select name="activity" class="form-control" id="">
													<option value="busines">Business</option>
													<option value="living">living</option>
												</select>
											</div>
											<div class="col-md-6 mt-3">
											<label for="">How many people will occupay the house</label>
											<input type="number" name="nbpeople"  class="form-control">
												
									
											
											</div>
										</div>
										<div class="row mt-3">
										<div class="col-md-6">
											    <label for="">when do you want to enter the house</label>
											    <input type="date" name="dateof"  class="form-control">
											   
											</div>

										</div>
											
											


										</div>

										<div class="text-right">
											<button type="submit" id="send" class="btn btn-primary">Send</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
  </div>
  	<!-- Edit Details Modal -->
	       <div class="modal fade" id="success" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Success Message</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Your request has been successfullly</p>
							<small>see your request details <a href="">here</a></small>


						</div>
					</div>
				</div>
		    </div>
			<!-- /Edit Details Modal -->

</div>

<script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/mask.js"></script>
		<script src="js/booking.js"></script>
		<?php include('footer.php');?>

