<script>	
function compare_passwords() {		
if (document.getElementById('password') === document.activeElement || document.getElementById('confirmpassword') === document.activeElement) {			
if (document.getElementById('password').value != '' || document.getElementById('confirmpassword').value != '') {				
if (document.getElementById('password').value != document.getElementById('confirmpassword').value) {		$('#password').removeClass('formfld_highlight_good');
	$('#confirmpassword').removeClass('formfld_highlight_good');					$('#password').addClass('formfld_highlight_bad');					$('#confirmpassword').addClass('formfld_highlight_bad');				}				else {		$('#password').removeClass('formfld_highlight_bad');					$('#confirmpassword').removeClass('formfld_highlight_bad');					$('#password').addClass('formfld_highlight_good');					$('#confirmpassword').addClass('formfld_highlight_good');				}			}		}		else {			
	if (document.getElementById('password').value == document.getElementById('confirmpassword').value) {				$('#password').removeClass('formfld_highlight_bad');					
					$('#confirmpassword').removeClass('formfld_highlight_bad');				$('#password').removeClass('formfld_highlight_good');				$('#confirmpassword').removeClass('formfld_highlight_good');			
					}		
					}	
					}
			</script>