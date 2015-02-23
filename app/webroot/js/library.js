function isNumberic(str){	
	var numberic = /^[\-]{1}[0]+$/;	
	if(numberic.test(str)) return false;
	if(str.length<=0) return false;
	return !isNaN(str);
}