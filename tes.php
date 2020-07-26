<script language="javascript">
function codename()
{
	if(document.formname.dion.checked)
	{
		document.formname.textname.disabled=false;
	}
	else
	{
		document.formname.textname.disabled=true;
	}
}
</script>
<form action="" method="" name="formname">
<input type="file" disabled name="textname">
<input type="checkbox" onclick="codename()" name="dion" value="ON">
<input type="submit" value="Add">
<input type="reset" value="Clear">
</form>