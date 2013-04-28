<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function(e) {
		var funcion="n1 n2 + n3 + n4 + n5 + n6 + 6 /";
		var funcion=" "+funcion;
        $(".nota").keyup(function(e) {
            var col=$(this).attr('data-col');
			var row=$(this).attr('data-row');
			
        });
    });
</script>
</head>

<body>
<table>
<tr>
	<td><input type="text" size="2" data-col="n1" data-row=="1" class="nota"/></td>
	<td><input type="text" size="2" data-col="n2" data-row=="1" class="nota"/></td>
    <td><input type="text" size="2" data-col="n3" data-row=="1" class="nota"/></td>
    <td><input type="text" size="2" data-col="n4" data-row=="1" class="nota"/></td>
    <td><input type="text" size="2" data-col="n5" data-row=="1" class="nota"/></td>
    <td><input type="text" size="2" data-col="n6" data-row=="1" class="nota"/></td>
</tr>
<tr>
	<td><input type="text" size="2" data-col="n1" data-row=="2" class="nota"/></td>
	<td><input type="text" size="2" data-col="n2" data-row=="2" class="nota"/></td>
    <td><input type="text" size="2" data-col="n3" data-row=="2" class="nota"/></td>
    <td><input type="text" size="2" data-col="n4" data-row=="2" class="nota"/></td>
    <td><input type="text" size="2" data-col="n5" data-row=="2" class="nota"/></td>
    <td><input type="text" size="2" data-col="n6" data-row=="2" class="nota"/></td>
</tr>
<tr>
	<td><input type="text" size="2" data-col="n1" data-row=="3" class="nota"/></td>
	<td><input type="text" size="2" data-col="n2" data-row=="3" class="nota"/></td>
    <td><input type="text" size="2" data-col="n3" data-row=="3" class="nota"/></td>
    <td><input type="text" size="2" data-col="n4" data-row=="3" class="nota"/></td>
    <td><input type="text" size="2" data-col="n5" data-row=="3" class="nota"/></td>
    <td><input type="text" size="2" data-col="n6" data-row=="3" class="nota"/></td>
</tr>
</table>
</body>
</html>