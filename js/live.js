$(document).ready(function(){
    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/narratives/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        let narratives = [];
        response.map((narrative) => {
            let singleNarrative =
                `<a class="nav-link narrative-link" data-narrative-id="${narrative.narrative_ID}" id="v-pills-${narrative.narrative_ID}-tab" data-toggle="pill" href="#v-pills-${narrative.narrative_ID}" role="tab" aria-controls="v-pills-${narrative.narrative_ID}" aria-selected="false">${narrative.title}</a>`;
            let singleNarrativeCaption =
                `<div class="tab-pane fade" id="v-pills-${narrative.narrative_ID}" role="tabpanel" aria-labelledby="v-pills-${narrative.narrative_ID}-tab">${narrative.title}</div>`;
            $('.narratives').append(singleNarrative);
            $('.narratives-caption').append(singleNarrativeCaption);
        });
        $('.loading').fadeOut('slow');
    });
});

$(document).on('click', '.narrative-link', function(){
    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/narrative_items/read_single.php",
        method      : "get",
        dataType    : "json",
        data: {
            item_ID: $(this).attr('data-narrative-id')
        }
    }).done((response) => {
        console.log(response);
    });
});