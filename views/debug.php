<div style="margin: 5em 0;padding:2em;background:#ECF5FA;color:#000;clear:both;">

<b>Peak Memory Usage</b>
<pre>
<?php print number_format(memory_get_peak_usage()); ?> bytes
</pre>

<b>URL</b>
<pre><?php print implode('/',url()); ?></pre>

<?php if(class_exists('db', FALSE))
{
	print '<b>'. count(db::$q). ' Database Queries</b>';
	foreach(db::$q as $query)
	{
		print '<pre style="background:#fff">'. $query. '</pre>';
	}
}
?>

<?php if(!empty($_SESSION)) { ?>
<b>Session Data</b>
<?php print '<pre>';print_r($_SESSION);print '</pre>'; ?>
<?php } ?>

<?php $included_files = get_included_files(); ?>
<b><?php print count($included_files); ?> PHP Files Included:</b>
<pre>
<?php print implode("\n", $included_files); ?>
</ul>
</pre>

</div>