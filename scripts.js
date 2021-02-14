$('#checkAll').click(function(e){
    var table= $(e.target).closest('table');
    $('th input:checkbox',table).prop('checked',this.checked);
});

 $('input:checkbox').click(function(){
	if (!$(this).is(':checked')){
		$('#checkAll').prop('checked', false);
	}
});