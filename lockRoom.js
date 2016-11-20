function lockRoom(room){
    var i = room.selectedIndex;

    if (i != -1) {
        document.getElementById("Room").value = room.options[i].text;
        alert (room.options[i].text);
        $.ajax({
            type: "POST",
            url: "/make_reservation.php",
            data: { Room: room.options[i].text},
            success:function(data){
                alert('successful');
            }
        });
    }
}