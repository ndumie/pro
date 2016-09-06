<?php

// app/Views/Subscribers/export.ctp
foreach ($header as $row):
	foreach ($row['Header'] as &$cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
	endforeach;
	echo implode(',', $row['Header']) . "\n";
endforeach;

foreach ($data as $row):
	foreach ($row['House'] as &$cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
	endforeach;
	echo implode(',', $row['House']) . "\n";
endforeach;