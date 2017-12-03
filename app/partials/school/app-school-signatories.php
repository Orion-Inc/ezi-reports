<div class="row">
	<div class="col-xs-7">
		<div class="thumbnail"> 
		    <img alt="Head Signature" style="height: 45px; width: 100%; display: block;" src="<?php School::getSchoolSignatories($_SESSION['SESS_USER_ID'],'school_head')?>">                                                
		</div>
	</div>
	<div class="col-xs-5">
		<p>Head <span class="hidden-xs">Signature</span></p>
		<a href="#" data-toggle="modal" data-target="#edit-head-signature-modal">Change</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-7">
		<div class="thumbnail"> 
		    <img alt="Asst. Head Signature" style="height: 45px; width: 100%; display: block;" src="<?php School::getSchoolSignatories($_SESSION['SESS_USER_ID'],'school_ass_head')?>">                                                
		</div>
	</div>
	<div class="col-xs-5">
		<p>Asst. Head <span class="hidden-xs">Signature</span></p>
		<a href="#" data-toggle="modal" data-target="#edit-ass-head-signature-modal">Change</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-7">
		<div class="thumbnail"> 
		    <img alt="Accountant Signature" style="height: 45px; width: 100%; display: block;" src="<?php School::getSchoolSignatories($_SESSION['SESS_USER_ID'],'school_accountant')?>">                                                
		</div>
	</div>
	<div class="col-xs-5">
		<p>Accountant <span class="hidden-xs">Signature</span></p>
		<a href="#" data-toggle="modal" data-target="#edit-accountant-signature-modal">Change</a>
	</div>
</div>

