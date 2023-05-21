<div class="container logbook">

	<h2><?php echo lang('gen_hamradio_logbook'); ?></h2>
	<?php if ($results) { ?>
		<h6><?php echo lang('gen_hamradio_logbook').": <span class='station_logbook_decoration'>".$this->logbooks_model->find_name($this->session->userdata('active_station_logbook')); ?></span> <?php echo lang('general_word_location').": <span class='station_location_decoration'>".$this->stations->find_name(); ?></span></h6>
	<?php } ?>


	<?php if($this->session->flashdata('notice')) { ?>
	<div class="alert alert-info" role="alert">
	  <?php echo $this->session->flashdata('notice'); ?>
	</div>
	<?php } ?>
</div>
	
<?php if($this->optionslib->get_option('logbook_map') != "false") { ?>
	<!-- Map -->
	<div id="map" style="width: 100%; height: 350px"></div>
<?php } ?>

<div style="padding-top: 10px; margin-top: 0px;" class="container logbook">
	<?php $this->load->view('view_log/partial/log_ajax') ?>
