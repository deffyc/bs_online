<?php
include_once('checksession.php');
require_once('bin/output.php');

output_header();
output_top_bar("dashboard");
include 'dashboard_info.php';
output_footer();


