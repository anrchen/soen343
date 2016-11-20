function lockRoom(room){
	var index = room.selectedIndex;
	var roomSelected = room.options[index].text;
	console.log(roomSelected);
	
	$.ajax({
		url: 'action_lockRoom.php',
		data: 'room='+roomSelected,
		success: function(data){
			$('#content').html(data);			
		}
	})
	
	console.log(roomSelected);
};