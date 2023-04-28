<div class="container-fluid qso_manager pt-3 pl-4 pr-4">
	<?php if ($this->session->flashdata('message')) { ?>
		<!-- Display Message -->
		<div class="alert-message error">
			<p><?php echo $this->session->flashdata('message'); ?></p>
		</div>
	<?php } ?>
<div class="row">
	<form id="searchForm" name="searchForm" action="<?php echo base_url()."index.php/logbookadvanced/search";?>" method="post">
		<div class="form-row">
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="dateFrom">From</label>
				<div class="input-group input-group-sm date" id="dateFrom" data-target-input="nearest">
					<input name="dateFrom" type="text" placeholder="<?php echo $datePlaceholder;?>" class="form-control" data-target="#dateFrom"/>
					<div class="input-group-append"  data-target="#dateFrom" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label for="dateTo">To</label>
				<div class="input-group input-group-sm date" id="dateTo" data-target-input="nearest">
					<input name="dateTo" type="text" placeholder="<?php echo $datePlaceholder;?>" class="form-control" data-target="#dateTo"/>
					<div class="input-group-append"  data-target="#dateTo" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="de">De</label>
				<select id="de" name="de" class="form-control form-control-sm">
					<option value="">All</option>
					<?php
					foreach($deOptions as $deOption){
						?><option value="<?php echo htmlentities($deOption);?>"><?php echo htmlspecialchars($deOption);?></option><?php
					}
					?>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="dx">Dx</label>
				<input type="text" name="dx" id="dx" class="form-control form-control-sm" value="">
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="dxcc">DXCC</label>
				<select class="form-control form-control-sm" id="dxcc" name="dxcc">
				<option value="">-</option>	
				<option value="0">None (/MM, /AM)</option>
					<?php
					foreach($dxccarray as $dxcc){
						echo '<option value=' . $dxcc->adif;
						echo '>' . $dxcc->prefix . ' - ' . ucwords(strtolower($dxcc->name), "- (/");
						if ($dxcc->Enddate != null) {
							echo ' - (Deleted DXCC)';
						}
						echo '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="iota">IOTA</label>
				<select class="form-control form-control-sm" id="iota" name="iota">
					<option value ="">-</option>
					<?php
					foreach($iotaarray as $iota){
						echo '<option value=' . $iota->tag;
						echo '>' . $iota->tag . ' - ' . $iota->name . '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="state">State</label>
				<input type="text" name="state" id="state" class="form-control form-control-sm" value="">
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="gridsquare">Gridsquare</label>
				<input type="text" name="gridsquare" id="gridsquare" class="form-control form-control-sm" value="">
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="mode">Mode</label>
				<select id="mode" name="mode" class="form-control form-control-sm">
					<option value="">All</option>
					<?php
					foreach($modes as $modeId => $mode){
						?><option value="<?php echo htmlspecialchars($mode);?>"><?php echo htmlspecialchars($mode);?></option><?php
					}
					?>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="band">Band</label>
				<select id="band" name="band" class="form-control form-control-sm">
					<option value="">All</option>
					<?php
					foreach($bands as $band){
						?><option value="<?php echo htmlentities($band);?>"><?php echo htmlspecialchars($band);?></option><?php
					}
					?>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label class="form-label" for="selectPropagation">Propagation</label>
				<select id="selectPropagation" name="selectPropagation" class="form-control form-control-sm">
				<option value="">All</option>
						<option value="AS">Aircraft Scatter</option>
						<option value="AUR">Aurora</option>
						<option value="AUE">Aurora-E</option>
						<option value="BS">Back scatter</option>
						<option value="ECH">EchoLink</option>
						<option value="EME">Earth-Moon-Earth</option>
						<option value="ES">Sporadic E</option>
						<option value="FAI">Field Aligned Irregularities</option>
						<option value="F2">F2 Reflection</option>
						<option value="INTERNET">Internet-assisted</option>
						<option value="ION">Ionoscatter</option>
						<option value="IRL">IRLP</option>
						<option value="MS">Meteor scatter</option>
						<option value="RPT">Terrestrial or atmospheric repeater or transponder</option>
						<option value="RS">Rain scatter</option>
						<option value="SAT">Satellite</option>
						<option value="TEP">Trans-equatorial</option>
						<option value="TR">Tropospheric ducting</option>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label for="qslSent">QSL Sent</label>
				<select id="qslSent" name="qslSent" class="form-control form-control-sm">
					<option value="">All</option>
					<option value="Y">Yes</option>
					<option value="N">No</option>
					<option value="R">Requested</option>
					<option value="Q">Queued</option>
					<option value="I">Ignore/Invalid</option>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label for="qslReceived">QSL Received</label>
				<select id="qslReceived" name="qslReceived" class="form-control form-control-sm">
					<option value="">All</option>
					<option value="Y">Yes</option>
					<option value="N">No</option>
					<option value="R">Requested</option>
					<option value="I">Ignore/Invalid</option>
					<option value="V">Verified</option>
				</select>
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-3 col-xl">
				<label for="qsoResults"># Results</label>
				<select id="qsoResults" name="qsoResults" class="form-control form-control-sm">
					<option value="250">250</option>
					<option value="1000">1000</option>
					<option value="2500">2500</option>
					<option value="5000">5000</option>
				</select>
			</div>
			<div class="form-group col-lg col-md-3 col-sm-3 col-xl-1">
				<label>&nbsp;</label><br>
				<button type="submit" class="btn btn-sm btn-primary" id="searchButton">Search</button>
				<button type="reset" class="btn btn-sm btn-danger" id="resetButton">Reset</button>
			</div>
		</div>
	</form>
	<div class="mb-2">
		<span class="h6">With selected :</span>
		<button type="button" class="btn btn-sm btn-primary" id="btnUpdateFromCallbook">Update from Callbook</button>
		<button type="button" class="btn btn-sm btn-primary" id="queueBureau">Queue Bureau</button>
		<button type="button" class="btn btn-sm btn-primary" id="queueDirect">Queue Direct</button>
		<button type="button" class="btn btn-sm btn-primary" id="queueElectronic">Queue Electronic</button>
		<button type="button" class="btn btn-sm btn-success" id="sentBureau">Sent Bureau</button>
		<button type="button" class="btn btn-sm btn-success" id="sentDirect">Sent Direct</button>
		<button type="button" class="btn btn-sm btn-success" id="sentElectronic">Sent Electronic</button>
		<button type="button" class="btn btn-sm btn-warning" id="dontSend">Don't Send</button>
		<button type="button" class="btn btn-sm btn-info" id="exportAdif">Create ADIF</button>
		<button type="button" class="btn btn-sm btn-danger" id="deleteQsos">Delete</button>
		<span id="infoBox"></span>
	</div>
	</div>
	<table style="width:100%" class="table-sm table table-bordered table-hover table-condensed text-center" id="qsoList">
		<thead>
			<tr>
				<th><div class="form-check" style="margin-top: -1.5em"><input class="form-check-input" type="checkbox" id="checkBoxAll" /></div></th>
				<th>Date/Time</th>
				<th>De</th>
				<th>Dx</th>
				<th>Mode</th>
				<th>RST (S)</th>
				<th>RST (R)</th>
				<th>Band</th>
				<th>My Refs</th>
				<th>Refs</th>
				<th>Name</th>
				<th>QSL Via</th>
				<th>QSL Sent</th>
				<th>QSL Received</th>
				<th>QSL Msg</th>
				<th>DXCC</th>
				<th>State</th>
				<th>CQ Zone</th>
				<th>IOTA</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>


</div>
