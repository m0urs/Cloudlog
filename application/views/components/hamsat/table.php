<div class="table-responsive">

    <h2>Hamsat - Satellite Rovers</h2>
    <p>This data is from <a target="_blank" href="https://hams.at/">https://hams.at/</a></p>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Date / Time</th>
                <th>Callsign</th>
                <th>Satellite</th>
                <th>Gridsquare</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rovedata as $rove) : ?>
                <tr>
                    <td>
                        <?php

                        // Get Date format
                        if ($this->session->userdata('user_date_format')) {
                            // If Logged in and session exists
                            $custom_date_format = $this->session->userdata('user_date_format');
                        } else {
                            // Get Default date format from /config/cloudlog.php
                            $custom_date_format = $this->config->item('qso_date_format');
                        }

                        ?>

                        <?php $timestamp = strtotime($rove['date']);
                        echo date($custom_date_format, $timestamp); ?>

                        - <?php echo $rove['start_time']; ?> - <?php echo $rove['end_time']; ?>

                    </td>
                    <td><span data-toggle="tooltip" title="<?php echo $rove['comment']; ?>"><?php echo $rove['callsign']; ?></span></td>
                    <td><span data-toggle="tooltip" title="<?php echo $rove['frequency']; ?> - <?php echo $rove['mode']; ?>"><?= $rove['satellite'] ?></span></td>
                    <td>


                        <?php

                        // Load the logbook model and call check_if_grid_worked_in_logbook
                        $CI = &get_instance();
                        $CI->load->model('logbook_model');
                        $worked = $CI->logbook_model->check_if_grid_worked_in_logbook($rove['gridsquare'], null, "SAT");
                        if ($worked != 0) {
                            echo " <span data-toggle=\"tooltip\" title=\"Worked\" class=\"badge badge-success\">" . $rove['gridsquare'] . "</span>";
                        } else {
                            echo " <span data-toggle=\"tooltip\" title=\"Not Worked\" class=\"badge badge-danger\">" . $rove['gridsquare'] . "</span>";
                        }
                        ?>


                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>