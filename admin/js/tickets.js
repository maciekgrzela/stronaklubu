$(document).ready(function() {

    let table = $('#ticketsTable').DataTable();

    let type = $('#type').val();
    console.log(type);
    let user = $('#user').val();
    console.log(user);
    let worker = $('#worker').val();
    console.log(worker);
 
    $('#ticketsTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	table.clear();
	table.draw();

    let client;
    if (type == "user") {
        client = user;
    } else if (type == "worker") {
        client = worker;
    }

	$.ajax({
		url : "http://localhost/stronaklubu/backend/api/tickets/read_specific.php?client_ID="+client,
		method : "GET",
		dataType : "json"
		
	}).done((response) => {


			for (var i = 0; i < response.length; i++) {
				table.row.add(
                    [response[i].ticket_ID,
                    response[i].clubHome, 
                    response[i].clubAway,
                    response[i].seat,
					response[i].match_date, 
					response[i].seat]
					);
			}

			table.draw();
    });

    $("#ticketsTable tbody").on('click', 'tr', function() {

        // var newsID = table.row( this ).data()[0];
        // var newsAuthor = table.row( this ).data()[1];
        // var title = table.row( this ).data()[2];
        // var content = table.row( this ).data()[3];
        // var imgPath = table.row( this ).data()[4];
        // var tags = table.row( this ).data()[5];
        
        // $("#newsID").val(newsID);
        // $("#authorID").val(newsAuthor);
        // $("#newsTitle").val(title);
        // $("#newsContent").val(content);
        // $("#newsImgPath").val(imgPath);
        // $("#newsTags").val(tags);
       
   });  


});
