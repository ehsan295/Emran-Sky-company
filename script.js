$(document).ready(function() {
	
	$("#unitprice").blur(function() {
		var unitprice = $("#unitprice").val();
		var quantity = $("#quantity").val();
		var totalprice = unitprice * quantity;
		$("#totalprice").val(totalprice);
	});
	
	$("a.delete").click(function() {
		var sure = window.confirm("آیا مطمئن هستید؟");
		if(!sure) {
			event.preventDefault();
		}
	});
	
});