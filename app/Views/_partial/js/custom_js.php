<?php
echo script_tag('assets/bootstrap/5.0/js/bootstrap.bundle.min.js');

echo (isset($addJs) ? $this->renderSection($addJs) : "");