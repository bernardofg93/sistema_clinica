<?php

echo $fecha = date("Y-m-d");

echo $fecha2 = date("Y-m-d", strtotime("+1 day", strtotime($fecha)));