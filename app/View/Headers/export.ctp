<?php

// app/Views/Subscribers/export.ctp
foreach ($data as $row):
	foreach ($row['Header'] as &$cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
	endforeach;
	echo implode(',', $row['Header']) . "\n";
endforeach;