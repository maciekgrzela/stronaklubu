const amountOfNarrativeItems = (id) => {
    return $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/narrative-items/read_with_narrative.php",
        method      : "get",
        dataType    : "json",
        data: {
            narrative_id: id
        }
    });
};

$(document).ready(function(){

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/narratives/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        let narratives = [];
        response.map((narrative) => {
            let a = moment();
            let b = moment(narrative.date);
            let minDiff = a.diff(b, 'minutes');
            let singleNarrative =
                `<a class="nav-link narrative-link" data-narrative-id="${narrative.narrative_ID}" id="v-pills-${narrative.narrative_ID}-tab" data-toggle="pill" href="#v-pills-${narrative.narrative_ID}" role="tab" aria-controls="v-pills-${narrative.narrative_ID}" aria-selected="false">${narrative.title} ${minDiff < 90 ? '<span class="badge badge-secondary">LIVE</span>' : ''}</a>`;
            let singleNarrativeCaption =
                `<div class="tab-pane fade live-narrative" id="v-pills-${narrative.narrative_ID}" role="tabpanel" aria-labelledby="v-pills-${narrative.narrative_ID}-tab">
                    <div class="jumbotron live-placeholder rounded shadow">
                        <div class="container py-3">
                            <h1 class="display-4 text-white d-flex py-0 my-2 px-0">${narrative.title}</h1>
                        </div>
                    </div>
                    <div class="container-fluid narrative-list-${narrative.narrative_ID}"></div>
                </div>`;
            $('.narratives').append(singleNarrative);
            $('.narratives-caption').append(singleNarrativeCaption);
        });
        $('.loading').fadeOut('slow');
    });
});

$(document).on('click', '.narrative-link', function(){
    let narrativesCount = 0;
    let narrativeId = $(this).attr('data-narrative-id');

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/narrative-items/read_with_narrative.php",
        method      : "get",
        dataType    : "json",
        data: {
            narrative_id: $(this).attr('data-narrative-id')
        }
    }).done((response) => {
        console.log(response);
        if(response.message == null){
            response.reverse();
            narrativesCount = response.length;
            let narrativeItems = `<ul class="list-group list-group-flush">`;
            response.map((narrativeItem) => {
               narrativeItems += `<li class="list-group-item d-inline-flex">
                <img class="img-fluid mr-2" style="max-height: 50px" src="img/narratives/${narrativeItem.img_path}.png" />
                <p>${narrativeItem.text} <span class="ml-1 text-muted">${narrativeItem.date} by ${narrativeItem.author_first_name} ${narrativeItem.author_last_name}</span></p></li>`;
            });
            narrativeItems += "</ul>";
            $('.narrative-list-'+$(this).attr('data-narrative-id')).html(narrativeItems);
        }else {
            let noNarrativeItems = `<p>Relacja nie posiada żadnych wpisów</p>`;
            $('.narrative-list-'+$(this).attr('data-narrative-id')).html(noNarrativeItems);
        }

        const time = setInterval(() => {
            let newNarrativesCount = narrativesCount;
            amountOfNarrativeItems(narrativeId).then(response => {
                newNarrativesCount = response.length;

                if(newNarrativesCount > narrativesCount){
                    response.reverse();
                    narrativesCount = newNarrativesCount;
                    let narrativeItems = `<ul class="list-group list-group-flush">`;
                    response.map((narrativeItem) => {
                        narrativeItems += `<li class="list-group-item d-inline-flex">
                        <img class="img-fluid mr-2" style="max-height: 50px" src="img/narratives/${narrativeItem.img_path}.png" />
                        <p>${narrativeItem.text} <span class="ml-1 text-muted">${narrativeItem.date} by ${narrativeItem.author_first_name} ${narrativeItem.author_last_name}</span></p></li>`;
                    });
                    narrativeItems += "</ul>";
                    $('.narrative-list-'+narrativeId).html(narrativeItems);
                }
            });
        }, 30000);

    });
});