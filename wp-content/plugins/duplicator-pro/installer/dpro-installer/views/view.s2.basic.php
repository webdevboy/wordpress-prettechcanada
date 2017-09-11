<!-- =========================================
BASIC PANEL -->
<div class="hdr-sub1 toggle-hdr" data-type="toggle" data-target="#s2-db-basic">
	<a href="javascript:void(0)"><i class="fa fa-minus-square"></i>Setup</a>
</div>
<div id="s2-db-basic">
	<table class="dupx-opts">
		<tr>
			<td>Action:</td>
			<td>
				<select name="dbaction" id="dbaction">
					<option value="create">Create New Database</option>
					<option value="empty">Connect and Remove All Data</option>
					<option value="rename">Connect and Backup Any Existing Data</option>
					<option value="manual">Manual SQL Execution (Advanced)</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Host:</td>
			<td><input type="text" name="dbhost" id="dbhost" required="true" value="<?php echo htmlspecialchars($GLOBALS['FW_DBHOST']); ?>" placeholder="localhost" /></td>
		</tr>
		<tr>
			<td>Database:</td>
			<td>
				<input type="text" name="dbname" id="dbname" required="true" value="<?php echo htmlspecialchars($GLOBALS['FW_DBNAME']); ?>"  placeholder="new or existing database name"  />
				<div class="s2-warning-emptydb">
					Warning: The selected 'Action' above will remove <u>all data</u> from this database!
				</div>
				<div class="s2-warning-renamedb">
					Notice: The selected 'Action' will rename <u>all existing tables</u> from the database name above with a prefix '<?php echo $GLOBALS['DB_RENAME_PREFIX']; ?>'.
					The prefix is only applied to existing tables and not the new tables that will be installed.
				</div>
				<div class="s2-warning-manualdb">
					Notice: The 'Manual SQL execution' action will prevent the SQL script in the archive from running. The database above should already be
					pre-populated with data which will be updated in the next step. No data in the database will be modified until after Step 3 runs.
				</div>
			</td>
		</tr>
		<tr><td>User:</td><td><input type="text" name="dbuser" id="dbuser" required="true" value="<?php echo htmlspecialchars($GLOBALS['FW_DBUSER']); ?>" placeholder="valid database username" /></td></tr>
		<tr><td>Password:</td><td><input type="text" name="dbpass" id="dbpass" value="<?php echo htmlspecialchars($GLOBALS['FW_DBPASS']); ?>"  placeholder="valid database user password"   /></td></tr>
	</table>
</div>
<br/><br/>

<!-- =========================================
OPTIONS -->
<div class="hdr-sub1 toggle-hdr" id="s2-opts-hdr-basic" data-type="toggle" data-target="#s2-opts-basic">
	<a href="javascript:void(0)"><i class="fa fa-plus-square"></i>Options</a>
</div>
<div id="s2-opts-basic" class="s2-opts" style="display:none;padding-top:0">
	<div class="help-target">
		<a href="<?php echo $GLOBALS['_HELP_URL_PATH'];?>#help-s2" target="_blank"><i class="fa fa-question-circle"></i></a>
	</div>

	<table class="dupx-opts dupx-advopts">
		<tr>
			<tr>
				<td>Spacing:</td>
				<td><input type="checkbox" name="dbnbsp" id="dbnbsp" value="1" /> <label for="dbnbsp">Fix non-breaking space characters</label></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Mode:</td>
				<td>
					<input type="radio" name="dbmysqlmode" id="dbmysqlmode_1" checked="true" value="DEFAULT"/> <label for="dbmysqlmode_1">Default</label> &nbsp;
					<input type="radio" name="dbmysqlmode" id="dbmysqlmode_2" value="DISABLE"/> <label for="dbmysqlmode_2">Disable</label> &nbsp;
					<input type="radio" name="dbmysqlmode" id="dbmysqlmode_3" value="CUSTOM"/> <label for="dbmysqlmode_3">Custom</label> &nbsp;
					<div id="dbmysqlmode_3_view" style="display:none; padding:5px">
						<input type="text" name="dbmysqlmode_opts" value="" /><br/>
						<small>Separate additional <a href="<?php echo $GLOBALS['_HELP_URL_PATH'];?>#help-mysql-mode" target="_blank">sql modes</a> with commas &amp; no spaces.<br/>
							Example: <i>NO_ENGINE_SUBSTITUTION,NO_ZERO_IN_DATE,...</i>.</small>
					</div>
				</td>
			</tr>
		<tr><td>Charset:</td><td><input type="text" name="dbcharset" id="dbcharset" value="<?php echo $_POST['dbcharset'] ?>" /> </td></tr>
		<tr><td>Collation: </td><td><input type="text" name="dbcollate" id="dbcollate" value="<?php echo $_POST['dbcollate'] ?>" /> </tr>
	</table>
</div>
<br/><br/>

<!-- =========================================
BASIC: DB VALIDATION -->
<div class="hdr-sub1 toggle-hdr" data-type="toggle" data-target="#s2-dbtest-area-basic">
	<a href="javascript:void(0)"><i class="fa fa-minus-square"></i>Validation</a>
</div>

<div id="s2-dbtest-area-basic" class="s2-dbtest-area">
	<div id="s2-dbrefresh-basic">
		<a href="javascript:void(0)" onclick="DUPX.testDBConnect()"><i class="fa fa-refresh"></i> Retry Test</a>
	</div>
	<div style="clear:both"></div>
	<div id="s2-dbtest-hb-basic" class="s2-dbtest-hb">
		<div class="message">
			To continue click the 'Test Database' button <br/>
			to	perform a database integrity check.
		</div>
	</div>
</div>

<br/><br/><br/>
<br/><br/><br/>


<div class="footer-buttons">
	<button id="s2-dbtest-btn-basic" type="button" onclick="DUPX.testDBConnect()" class="default-btn" /><i class="fa fa-database"></i> Test Database</button>
	<button id="s2-next-btn-basic" type="button" onclick="DUPX.confirmDeployment()" class="default-btn disabled" disabled="true"
			title="The 'Test Database' connectivity requirments must pass to continue with install!">
		Next <i class="fa fa-caret-right"></i>
	</button>
</div>


<script>
/**
 *  Bacic Action Change  */
DUPX.basicDBActionChange = function ()
{
	var action = $('#dbaction').val();
	$('#s2-basic-pane .s2-warning-manualdb').hide();
	$('#s2-basic-pane .s2-warning-emptydb').hide();
	$('#s2-basic-pane .s2-warning-renamedb').hide();
	switch (action)
	{
		case 'create'  :	break;
		case 'empty'   : $('#s2-basic-pane .s2-warning-emptydb').show(300);		break;
		case 'rename'  : $('#s2-basic-pane .s2-warning-renamedb').show(300);	break;
		case 'manual'  : $('#s2-basic-pane .s2-warning-manualdb').show(300);	break;
	}
};

//DOCUMENT INIT
$(document).ready(function ()
{
	$("#dbaction").on("change", DUPX.basicDBActionChange);
	DUPX.basicDBActionChange();

	$("input[name=dbmysqlmode]").click(function() {
		($(this).val() == 'CUSTOM')
			? $('#dbmysqlmode_3_view').show()
			: $('#dbmysqlmode_3_view').hide();
	});

});
</script>