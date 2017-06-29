function chkPassword()
{
var init=document.getElementById("passwordsignup");
var second=document.getElementById("passwordsignup_confirm");
if(init.value==""){
alert("This is a required field. You did not enter a password \n"+" Please enter one now");
init.focus();
return false;
}
if(init.value!=second.value){
alert(" The two passwords you entered are not the same \n" +
"Please re-enter both now");
init.focus();
init.select();
return false;
}
else
return true;
}