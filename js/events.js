$(document).ready(function () {

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/matches/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        let matches = [];
        response.map((match) => {
            let singleMatch = {
                start: match.date_of_match,
                end: match.date_of_match,
                color: '#b40000',
                class: 'calendar-item text-secondary',
                title: `<div attr-match='${JSON.stringify(match)}'><img class="img-fluid" src="img/teams/${match.club1_ID === "1" ? match.club2_path_img_logo : match.club1_path_img_logo}.png" />`+`<span class="pl-1">${match.club1_ID === "1" ? match.club2_clubname : match.club1_clubname}</span></div>`,
            };
            matches.push(singleMatch);
        });
        $('.matches-calendar').equinox({
           events: matches
        });
        $('.loading').fadeOut('slow');
    });
});

$(document).on('click', '.calendar-item', function(e){
   e.preventDefault();
   const matchDetails = JSON.parse($(this).find('div').attr('attr-match'));
   console.log(matchDetails);
   let details =
       `<h3 class="mt-4 pb-2 font-weight-light border-bottom d-flex">Szczegóły wydarzenia</h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 px-0">
                    <img class="img-fluid mx-auto d-block" style="width: 50%" src="./img/teams/${matchDetails.club1_ID === "1" ? matchDetails.club2_path_img_logo : matchDetails.club1_path_img_logo}.png" />
                </div>
                <div class="col-9 px-0">
                    <ul class="nearest-match-list">
                        <li>Data: ${matchDetails.date_of_match}</li>
                        <li>Przeciwnik: ${matchDetails.club2_clubname}</li>
                        <li>Stadion: ${matchDetails.stadium}</li>
                        <li>Adres: ${matchDetails.match_address}</li>
                        <li>Liczba widzów: ${matchDetails.amount_of_spectators}</li>
                    </ul>
                </div>
            </div>
        </div>`;
   $('.event-details').html(details);
    $('html, body').animate({
        scrollTop: $(".event-details").offset().top
    }, 2000);
});